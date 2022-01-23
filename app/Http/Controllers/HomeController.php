<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\CaseType;
use App\Models\Category;
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
        $lawyersCount = Registration::where('type', 'lawyer')->get();
        $usersCount = Registration::where('type', 'user')->get();
        $caseCategoryCount = Category::all();
        $caseTypesCount = CaseType::all();

        return view('backend.pages.dashboard', compact(
            'lawyersCount', 'usersCount', 'caseCategoryCount', 'caseTypesCount'));
    }

    public function frontend()
    {
        $totalUsers = Registration::where('type', 'user')->get()->count();
        $totalLayers = Registration::where('type', 'lawyer')->get()->count();
        $caseTypes = CaseType::all();
        $sliders = Slider::with('image')->status()->get();
//        dd($sliders->toArray());
        $top_10_lawyers = Registration::with('rate', 'image')->where('type', 'lawyer')->get()->sortByDesc('rate.average_rate')->take(10);
        $top_3_lawyers = Registration::with('rate', 'image')->where('type', 'lawyer')->get()->sortByDesc('rate.average_rate')->take(2);

        $all_lawyers = Registration::with('category', 'rate', 'image')->where('type', 'lawyer')->get()->sortByDesc('rate.average_rate');
        $senior_lawyers = $all_lawyers->filter(function ($lawyer){
           return $lawyer->category()->where('title', 'senior lawyer')->first();
        });
        $top_3_senior_lawyers = $senior_lawyers;

        $totalCases = Cases::all();

        return  view('frontend.home', compact('totalCases','top_3_lawyers', 'top_3_senior_lawyers','totalLayers','totalUsers', 'sliders', 'top_10_lawyers', 'senior_lawyers', 'caseTypes'));
    }
}
