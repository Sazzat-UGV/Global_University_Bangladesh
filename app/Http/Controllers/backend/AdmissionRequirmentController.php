<?php

namespace App\Http\Controllers\backend;

use Image;
use Illuminate\Http\Request;
use App\Models\AdmissionRequirment;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\AdmissionRequirmentStoreRequest;
use App\Http\Requests\AdmissionRequirmentUpdateRequest;

class AdmissionRequirmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('requirment-list');
        $requirments = AdmissionRequirment::select('id', 'admission_type', 'admission_department', 'admission_image', 'requirment_description', 'is_active', 'created_at')->latest('id')->get();
        return view('backend.pages.requirment.index', compact('requirments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('requirment-create');
        return view('backend.pages.requirment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdmissionRequirmentStoreRequest $request)
    {
        Gate::authorize('requirment-create');
        $requirment = AdmissionRequirment::create([
            "admission_type" => $request->admission_type,
            "admission_department" => $request->admission_department,
            "requirment_description" => $request->requirment_description,
        ]);
        $this->image_upload($request, $requirment->id);
        Toastr::success('Requirment added successfully');
        return redirect()->route('requirment.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('requirment-edit');
        $requirment = AdmissionRequirment::findOrFail($id);
        return view('backend.pages.requirment.edit', compact('requirment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdmissionRequirmentUpdateRequest $request, string $id)
    {
        Gate::authorize('requirment-edit');
        $requirment = AdmissionRequirment::findOrFail($id);
        $requirment->update([
            "admission_type" => $request->admission_type,
            "admission_department" => $request->admission_department,
            "requirment_description" => $request->requirment_description,
        ]);
        $this->image_upload($request, $requirment->id);
        Toastr::success('Requirment update successfully');
        return redirect()->route('requirment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('requirment-delete');
        $requirment = AdmissionRequirment::findOrFail($id);
        if ($requirment->admission_image != 'default_admission_requirment.png') {
            //delete old photo
            $photo_location = 'public/uploads/admission/';
            $old_photo_location = $photo_location . $requirment->admission_image;
            unlink(base_path($old_photo_location));
        }
        $requirment->delete();
        Toastr::success('Requirment delete successfully');
        return back();
    }



    public function changeStatus(string $id)
    {
        $requirment = AdmissionRequirment::find($id);
        if ($requirment->is_active == 1) {
            $requirment->is_active = 0;
        } else {
            $requirment->is_active = 1;
        }
        $requirment->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Status Updated',
        ]);
    }


    public function image_upload($request, $requirment_id)
    {
        $requirment = AdmissionRequirment::findorFail($requirment_id);

        if ($request->hasFile('admission_image')) {
            if ($requirment->admission_image != 'default_admission_requirment.png') {
                //delete old photo
                $photo_location = 'public/uploads/admission/';
                $old_photo_location = $photo_location . $requirment->admission_image;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/admission/';
            $uploaded_photo = $request->file('admission_image');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(620, 490)->save(base_path($new_photo_location));
            $check = $requirment->update([
                'admission_image' => $new_photo_name,
            ]);
        }
    }
}
