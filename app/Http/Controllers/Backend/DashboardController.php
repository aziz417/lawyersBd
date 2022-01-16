<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Registration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function userAll($type){
        $users = Registration::with('image')->where('type', $type)->get();
        return view('backend.pages.users.index', compact('users', 'type'));
    }
}
