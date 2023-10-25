<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Authority;
use App\Models\AuthorityMessage;
use App\Models\Contact;
use App\Models\Faculty;
use App\Models\Notice;
use App\Models\Result;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function dashboard()
    {
        Gate::authorize('access-dashboard');
        $role=Role::count();
        $admin=User::count();
        $contact=Contact::count();
        $faculty=Faculty::count();
        $authority=Authority::count();
        $result=Result::count();
        $notice=Notice::count();
        $message=AuthorityMessage::count();
        return view('backend.pages.dashboard',compact(
            'role',
            'admin',
            'contact',
            'faculty',
            'authority',
            'result',
            'notice',
            'message',
        ));
    }
}
