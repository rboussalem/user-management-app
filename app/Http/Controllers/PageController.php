<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function guestpage()
    {
        $this->authorize('guest_permission', auth()->user());
        return view('pages.guestpage');
    }

    public function userpage()
    {
        $this->authorize('user_permission', auth()->user());
        return view('pages.userpage');
    }

    public function adminpage()
    {
        $this->authorize('admin_permission', auth()->user());
        return view('pages.adminpage');
    }
}
