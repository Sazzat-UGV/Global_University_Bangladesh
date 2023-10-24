<?php

namespace App\Http\Controllers\backend;

use Image;
use Illuminate\Http\Request;
use App\Models\AuthorityMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorityMessageUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class AuthorityMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('message-list');
        $authorityMessages = AuthorityMessage::select('id', 'authority_name', 'authority_type', 'authority_message', 'authority_image', 'created_at')->latest('id')->get();
        return view('backend.pages.authority-message.index', compact('authorityMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        Gate::authorize('message-edit');
        $authorityMessage = AuthorityMessage::findOrFail($id);
        return view('backend.pages.authority-message.edit', compact('authorityMessage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorityMessageUpdateRequest $request, string $id)
    {
        Gate::authorize('message-edit');
        $authorityMessage = AuthorityMessage::findOrFail($id);
        $authorityMessage->update([
            'authority_name' => $request->authority_name,
            'authority_type' => $request->authority_type,
            'authority_message' => $request->authority_message,
        ]);
        $this->image_upload($request, $authorityMessage->id);
        Toastr::success('Message added successfully');
        return redirect()->route('authority-message.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function image_upload($request, $authorityMessage)
    {
        $authorityMessage = AuthorityMessage::findorFail($authorityMessage);

        if ($request->hasFile('authority_image')) {
            if ($authorityMessage->authority_image != 'default_image.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/authority-message/';
                $old_photo_location = $photo_location . $authorityMessage->authority_image;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/authority-message/';
            $uploaded_photo = $request->file('authority_image');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(1024, 1024)->save(base_path($new_photo_location));
            $check = $authorityMessage->update([
                'authority_image' => $new_photo_name,
            ]);
        }
    }
}
