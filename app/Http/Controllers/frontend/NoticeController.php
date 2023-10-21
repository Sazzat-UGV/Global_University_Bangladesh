<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::where('is_active', 1)->select('id', 'created_at', 'file','notice_title')->latest('id')->paginate(10);
        return view('frontend.pages.notice', compact('notices'));
    }
}
