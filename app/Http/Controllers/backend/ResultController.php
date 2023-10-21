<?php

namespace App\Http\Controllers\backend;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ResultStoreRequest;
use App\Http\Requests\ResultUpdateRequest;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('result-list');
        $results = Result::select('id', 'created_at', 'file', 'is_active', 'result_for', 'result_title')->latest('id')->get();
        return view('backend.pages.result.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('result-create');
        return view('backend.pages.result.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResultStoreRequest $request)
    {
        Gate::authorize('result-create');
        $result = Result::create([
            'result_for' => $request->result_for,
            'result_title' => $request->result_title,
        ]);
        $this->file_upload($request, $result->id);
        Toastr::success('Result upload successfully');
        return redirect()->route('result.index');
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
        Gate::authorize('result-edit');
        $result = Result::findOrFail($id);
        return view('backend.pages.result.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResultUpdateRequest $request, string $id)
    {
        Gate::authorize('result-edit');
        $result = Result::findOrFail($id);
        $result->update([
            'result_for' => $request->result_for,
            'result_title' => $request->result_title,

        ]);
        $this->file_upload($request, $result->id);
        Toastr::success('Result upload successfully');
        return redirect()->route('result.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('result-delete');
        $document = Result::where('id', $id)->first();
        $fileName = $document->file;
        $filePath = public_path('uploads/result/' . $fileName);
        if (file_exists($filePath)) {

            unlink($filePath);
            $document->delete();

            Toastr::success('Result delete successfully');
            return back();
        } else {
            Toastr::error("Result does't exist.");
            return back();
        }
    }



    public function changeStatus(string $id)
    {
        $result = Result::find($id);
        if ($result->is_active == 1) {
            $result->is_active = 0;
        } else {
            $result->is_active = 1;
        }
        $result->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Status Updated',
        ]);
    }



    public function file_upload($request, $result_id)
    {
        $result = Result::findOrFail($result_id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileExt = $file->getClientOriginalExtension();
            $fileNewName = $result_id . '.' . $fileExt;

            if ($file->getClientOriginalExtension() === 'pdf') {
                if ($result->file === $fileNewName) {
                    // Delete the old file if the new file has the same name
                    $filePath = public_path('uploads/result/' . $fileNewName);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
                $upload = $file->move(public_path('uploads/result'), $fileNewName);
                $result->file = $fileNewName;
                $result->save();
            }
        }
    }
}
