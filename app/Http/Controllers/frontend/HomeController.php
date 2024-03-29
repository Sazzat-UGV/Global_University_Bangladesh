<?php

namespace App\Http\Controllers\frontend;

use App\Models\Notice;
use App\Models\Slider;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\AuthorityMessage;
use App\Models\AdmissionRequirment;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ContactStoreRequest;

class HomeController extends Controller
{

    public function homepage()
    {
        $sliders = Slider::where('is_active', 1)->select('id', 'slider_heading', 'slider_image')->latest('id')->limit(6)->get();
        $authorityMessages = AuthorityMessage::select('id', 'authority_name', 'authority_type', 'authority_message', 'authority_image')->latest('id')->get();
        $notices = Notice::where('is_active', 1)->select('id', 'created_at', 'file','notice_title')->latest('id')->limit(3)->get();
        return view('frontend.pages.home',compact('sliders','authorityMessages','notices'));
    }
}
