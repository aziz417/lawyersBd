<?php

namespace App\Http\Controllers;

use App\Models\CaseType;
use App\Models\Rate;
use App\Models\Slider;
use App\Models\User;
use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.pages.dashboard');
    }

    public function frontend()
    {
        $caseTypes = CaseType::all();
        $sliders = Slider::with('image')->status()->get();
//        dd($sliders->toArray());
        $top_10_lawyers = Registration::with('rate', 'image')->where('type', 'lawyer')->get()->sortByDesc('rate.average_rate')->take(10);

        $all_lawyers = Registration::with('category', 'rate', 'image')->where('type', 'lawyer')->get()->sortByDesc('rate.average_rate');
        $senior_lawyers = $all_lawyers->filter(function ($lawyer){
           return $lawyer->category()->where('title', 'senior')->first();
        });

        return  view('frontend.home', compact('sliders', 'top_10_lawyers', 'senior_lawyers', 'caseTypes'));
    }
}
