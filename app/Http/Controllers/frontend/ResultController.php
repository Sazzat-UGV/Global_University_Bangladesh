<?php

namespace App\Http\Controllers\frontend;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{

    public function index($department)
    {
        $results = Result::where('is_active', 1)->where('result_for', $department)->select('id', 'created_at', 'file', 'result_for', 'result_title')->latest('id')->paginate(10);
        return view('frontend.pages.result', compact('results', 'department'));
    }
}
