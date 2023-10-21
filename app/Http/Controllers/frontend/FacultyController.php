<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index($department)
    {
        $faculties = Faculty::where('is_active', 1)->where('faculty_department',$department)->select('id', 'faculty_name', 'faculty_department', 'faculty_designation','faculty_image')->latest('id')->paginate(10);
        return view('frontend.pages.faculty', compact('faculties', 'department'));
    }
}
