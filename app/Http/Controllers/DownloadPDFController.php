<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DownloadPDFController extends Controller
{
    public function downloadResult($id, $filename)
    {
        $result = Result::where('id', $id)->where('file', $filename)->first();

        if (!$result) {
            abort(404); // File not found
        }

        $filePath = public_path('uploads/result/' . $result->file);

        if (file_exists($filePath)) {
            return Response::file($filePath, ['Content-Type' => 'application/pdf']);
        } else {
            abort(404); // File not found
        }
    }


    public function downloadNotice($id, $filename)
    {
        $notice = Notice::where('id', $id)->where('file', $filename)->first();

        if (!$notice) {
            abort(404); // File not found
        }

        $filePath = public_path('uploads/notice/' . $notice->file);

        if (file_exists($filePath)) {
            return Response::file($filePath, ['Content-Type' => 'application/pdf']);
        } else {
            abort(404); // File not found
        }
    }
}
