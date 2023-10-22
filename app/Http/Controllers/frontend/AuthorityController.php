<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Authority;
use Illuminate\Http\Request;

class AuthorityController extends Controller
{
    public function index($type)
    {
        $authorities = Authority::where('is_active', 1)->where('authority_type', $type)->select('id', 'authority_name', 'authority_type', 'authority_designation', 'authority_image')->latest('id')->paginate(10);
        return view('frontend.pages.authority', compact('authorities', 'type'));
    }
}
