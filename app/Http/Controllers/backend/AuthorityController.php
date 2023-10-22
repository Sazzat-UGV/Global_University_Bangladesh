<?php

namespace App\Http\Controllers\backend;

use Image;
use App\Models\Authority;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\AuthorityStoreRequest;
use App\Http\Requests\AuthorityUpdateRequest;

class AuthorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('faculty-list');
        $authorities = Authority::select('id', 'authority_name', 'authority_designation', 'authority_image','authority_type', 'is_active', 'created_at')->latest('id')->get();
        return view('backend.pages.authority.index', compact('authorities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('authority-create');
        return view('backend.pages.authority.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorityStoreRequest $request)
    {
        Gate::authorize('authority-create');
        $authority = Authority::create([
            'authority_name' => $request->authority_name,
            'authority_designation' => $request->authority_designation,
            'authority_type' => $request->authority_type,
        ]);
        $this->image_upload($request, $authority->id);
        Toastr::success('Authority added successfully');
        return redirect()->route('authority.index');
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
        Gate::authorize('authority-edit');
        $authority = Authority::findOrFail($id);
        return view('backend.pages.authority.edit', compact('authority'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorityUpdateRequest $request, string $id)
    {
        Gate::authorize('authority-edit');
        $authority = Authority::findOrFail($id);
        $authority->update([
            'authority_name' => $request->authority_name,
            'authority_designation' => $request->authority_designation,
            'authority_type' => $request->authority_type,
        ]);
        $this->image_upload($request, $authority->id);
        Toastr::success('Authority updated successfully');
        return redirect()->route('authority.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('authority-delete');
        $authority = Authority::findOrFail($id);
        if ($authority->authority_image != 'default_authority.jpg') {
            //delete old photo
            $photo_location = 'public/uploads/authority/';
            $old_photo_location = $photo_location . $authority->authority_image;
            unlink(base_path($old_photo_location));
        }
        $authority->delete();
        Toastr::success('Authority delete successfully');
        return back();
    }

    public function changeStatus(string $id)
    {
        $authority = Authority::find($id);
        if ($authority->is_active == 1) {
            $authority->is_active = 0;
        } else {
            $authority->is_active = 1;
        }
        $authority->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Status Updated',
        ]);
    }

    public function image_upload($request, $authority_id)
    {
        $authority = Authority::findorFail($authority_id);

        if ($request->hasFile('authority_image')) {
            if ($authority->authority_image != 'default_authority.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/authority/';
                $old_photo_location = $photo_location . $authority->authority_image;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/authority/';
            $uploaded_photo = $request->file('authority_image');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(1024, 1024)->save(base_path($new_photo_location));
            $check = $authority->update([
                'authority_image' => $new_photo_name,
            ]);
        }
    }
}
