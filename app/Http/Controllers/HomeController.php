<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Slider;
use App\Models\User;
use App\Registration;
use Illuminate\Http\Request;

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
        $sliders = Slider::status()->get();
        $top_10_lawyers = Registration::with('rate', 'image')->get()->sortByDesc('rate.average_rate')->take(10);
//        dd($top_10_lawyers->toArray());
        return  view('frontend.home', compact('sliders', 'top_10_lawyers'));
    }
}
