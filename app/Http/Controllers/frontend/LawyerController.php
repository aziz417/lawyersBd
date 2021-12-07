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
    public function lawyer($id){
        $lawyer = Registration::with('category')->where('id', $id)->first();
        return view('frontend.pages.LawyerDetails', compact('lawyer'));
    }

    public function rateSubmit(Request $request){
        dd($request->all());

        return "ff";
    }
}
