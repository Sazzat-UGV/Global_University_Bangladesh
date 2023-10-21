<?php

namespace App\Http\Controllers\backend;

use Image;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\FacultyStoreRequest;
use App\Http\Requests\FacultyUpdateRequest;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('faculty-list');
        $faculties = Faculty::select('id', 'faculty_name', 'faculty_department', 'faculty_designation', 'faculty_image', 'is_active', 'created_at')->latest('id')->get();
        return view('backend.pages.faculty.index', compact('faculties'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('faculty-create');
        return view('backend.pages.faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacultyStoreRequest $request)
    {
        Gate::authorize('faculty-create');
        $faculty = Faculty::create([
            'faculty_name' => $request->faculty_name,
            'faculty_department' => $request->faculty_department,
            'faculty_designation' => $request->faculty_designation,
        ]);
        $this->image_upload($request, $faculty->id);
        Toastr::success('Faculty added successfully');
        return redirect()->route('faculty.index');
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
        Gate::authorize('faculty-edit');
        $faculty = Faculty::findOrFail($id);
        return view('backend.pages.faculty.edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacultyUpdateRequest $request, string $id)
    {
        Gate::authorize('faculty-edit');
        $faculty = Faculty::findOrFail($id);
        $faculty->update([
            'faculty_name' => $request->faculty_name,
            'faculty_department' => $request->faculty_department,
            'faculty_designation' => $request->faculty_designation,
        ]);
        $this->image_upload($request, $faculty->id);
        Toastr::success('Faculty updated successfully');
        return redirect()->route('faculty.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('faculty-delete');
        $faculty = Faculty::findOrFail($id);
        if ($faculty->faculty_image != 'default_faculty.jpg') {
            //delete old photo
            $photo_location = 'public/uploads/faculty/';
            $old_photo_location = $photo_location . $faculty->faculty_image;
            unlink(base_path($old_photo_location));
        }
        $faculty->delete();
        Toastr::success('Faculty delete successfully');
        return back();
    }


    public function changeStatus(string $id)
    {
        $faculty = Faculty::find($id);
        if ($faculty->is_active == 1) {
            $faculty->is_active = 0;
        } else {
            $faculty->is_active = 1;
        }
        $faculty->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Status Updated',
        ]);
    }

    public function image_upload($request, $faculty_id)
    {
        $faculty = Faculty::findorFail($faculty_id);

        if ($request->hasFile('faculty_image')) {
            if ($faculty->faculty_image != 'default_faculty.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/faculty/';
                $old_photo_location = $photo_location . $faculty->faculty_image;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/faculty/';
            $uploaded_photo = $request->file('faculty_image');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(1024, 1024)->save(base_path($new_photo_location));
            $check = $faculty->update([
                'faculty_image' => $new_photo_name,
            ]);
        }
    }
}
