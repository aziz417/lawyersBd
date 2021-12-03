<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Registration;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    public function lawyerList(){
        $lawyers = Registration::with('category')->where('type', 'lawyer')->get();
        return view('frontend.pages.LawyerList', compact('lawyers'));
    }
}
