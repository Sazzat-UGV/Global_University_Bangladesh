<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\AuthorityMessage;
use App\Http\Controllers\Controller;

class AuthorityMessageController extends Controller
{
    public function view($type)
    {
        $messageDetails = AuthorityMessage::where('authority_type', $type)->select('id', 'authority_name', 'authority_type', 'authority_message', 'authority_image')->first();
        return view('frontend.pages.authority-message-details', compact('messageDetails'));
    }
}
