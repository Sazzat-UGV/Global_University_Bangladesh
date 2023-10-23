<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AdmissionRequirment;
use Illuminate\Http\Request;

class AdmissionRequirmentController extends Controller
{
    public function index($type)
    {
        $admissions = AdmissionRequirment::where('is_active', 1)->where('admission_type', $type)->select('id', 'admission_image', 'admission_type', 'admission_department', 'requirment_description')->get();
        return view('frontend.pages.admission', compact('admissions', 'type'));
    }
}
