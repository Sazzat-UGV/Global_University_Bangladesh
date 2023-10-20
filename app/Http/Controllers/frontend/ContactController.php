<?php

namespace App\Http\Controllers\frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ContactStoreRequest;

class ContactController extends Controller
{
    public function contact()
    {
        return view('frontend.pages.contact');
    }


    public function contact_post(ContactStoreRequest $request)
    {
        Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "subject" => $request->subject,
            "message" => $request->message,
        ]);

        Toastr::success('Message sent successfully');
        return back();
    }
}
