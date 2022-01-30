<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request){
        if (Auth::check()){
            Review::create([
                'user_id' => Auth::user()->id,
                'lawyer_id' => $request->lawyer_id,
                'title' => $request->title,
            ]);
            return redirect(route('lawyer.details', $request->lawyer_id))->with('success', 'Your Review Successfully Done');
        }else{
            return redirect(route('lawyer.details', $request->lawyer_id))->with('warningMsg', 'Please First Login And Try Again');
        }
    }
}
