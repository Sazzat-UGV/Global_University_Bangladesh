<?php

namespace App\Http\Controllers\backend;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeStoreRequest;
use App\Http\Requests\NoticeUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('notice-list');
        $notices = Notice::select('id', 'created_at', 'file', 'is_active', 'notice_title')->latest('id')->get();
        return view('backend.pages.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('notice-create');
        return view('backend.pages.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoticeStoreRequest $request)
    {
        Gate::authorize('notice-create');
        $notice = Notice::create([
            'notice_title' => $request->notice_title,
        ]);
        $this->file_upload($request, $notice->id);
        Toastr::success('Notice upload successfully');
        return redirect()->route('notice.index');
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
        Gate::authorize('notice-edit');
        $notice = Notice::findOrFail($id);
        return view('backend.pages.notice.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoticeUpdateRequest $request, string $id)
    {
        Gate::authorize('notice-edit');
        $notice = Notice::findOrFail($id);
        $notice->update([
            'notice_title' => $request->notice_title,
        ]);
        $this->file_upload($request, $notice->id);
        Toastr::success('Notice upload successfully');
        return redirect()->route('notice.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('notice-delete');
        $document = Notice::where('id', $id)->first();
        $fileName = $document->file;
        $filePath = public_path('uploads/notice/' . $fileName);
        if (file_exists($filePath)) {

            unlink($filePath);
            $document->delete();

            Toastr::success('Notice delete successfully');
            return back();
        } else {
            Toastr::error("Notice does't exist.");
            return back();
        }
    }


    public function changeStatus(string $id)
    {
        $notice = Notice::find($id);
        if ($notice->is_active == 1) {
            $notice->is_active = 0;
        } else {
            $notice->is_active = 1;
        }
        $notice->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Status Updated',
        ]);
    }

    public function file_upload($request, $notice_id)
    {
        $notice = Notice::findOrFail($notice_id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileExt = $file->getClientOriginalExtension();
            $fileNewName = $notice_id . '.' . $fileExt;

            if ($file->getClientOriginalExtension() === 'pdf') {
                if ($notice->file === $fileNewName) {
                    // Delete the old file if the new file has the same name
                    $filePath = public_path('uploads/notice/' . $fileNewName);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
                $upload = $file->move(public_path('uploads/notice'), $fileNewName);
                $notice->file = $fileNewName;
                $notice->save();
            }
        }
    }
}
