<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\CaseType;
use App\Models\ClientRate;
use App\Models\Rate;
use App\Models\Review;
use App\Models\User;
use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LawyerController extends Controller
{
    public function lawyerList(){
        $lawyers = Registration::with('category', 'user')->where('type', 'lawyer')->get();
        $caseTypes = CaseType::all();
        return view('frontend.pages.LawyerList', compact('lawyers', 'caseTypes'));
    }

    public function lawyer($id){
        $lawyer = Registration::with('category', 'cases')->where('id', $id)->first();
        if (Auth::check()){
            $successCase = Cases::where(['lawyer_id' => $id,
                'user_id' => Auth::user()->id,
                'status' => 5])->first();
            $thisLawyerThisUserRate = ClientRate::where('lawyer_id', $id)->where('user_id', Auth::user()->id)->first();
            $thisLawyerThisUserRate = $thisLawyerThisUserRate ? $thisLawyerThisUserRate->rate : 0;
        }else{
            $thisLawyerThisUserRate = 0;
            $successCase = 0;
        }
        $position['fight']    = $lawyer->cases()->whereNotIn('status', [0,1])->get()->count();

        $position['success']  = $lawyer->cases()->where('status', 5)->get()->count();

        $position['progress'] = $lawyer->cases()
                                       ->where('status', 2)
                                        ->get()
                                        ->count();

        $position['new']      = $lawyer->cases()
                                       ->where('status', 1)
                                       ->get()
                                       ->count();

        $win_case = Cases::where('lawyer_id', $id)->where('status', 5)->first();
        $win_cases = Cases::where('lawyer_id', $id)->where('status', 5)->get();

        $reviews = Review::where('lawyer_id', $id)->get();
        $satisfied_5_clients = Cases::with('user')->where('status', 5)->where('lawyer_id', $id)->distinct('user_id')->get()->take(5);
        return view('frontend.pages.LawyerDetails', compact('reviews','successCase','lawyer', 'position', 'win_cases', 'win_case', 'satisfied_5_clients', 'thisLawyerThisUserRate'));
    }

    public function rateSubmit(Request $request){
        if (!Auth::check()){
            return back()->with('warningMsg', 'First Login Then Submit Your Rate');
        }

        $lawyer_rate = Rate::where('registration_id', $request->lawyer_id)->first();
        if ($lawyer_rate){
            $exsitCLientRate = ClientRate::where([
                'user_id' => Auth::user()->id,
                'lawyer_id' => $request->lawyer_id,
            ])->first();
            if ($exsitCLientRate){
                $exsitCLientRate->update([
                    'rate' => $request->client_rate,
                ]);
            }else{
                ClientRate::create([
                    'user_id' => Auth::user()->id,
                    'lawyer_id' => $request->lawyer_id,
                    'rate' => $request->client_rate,
                ]);
            }

            $clientAvg = ClientRate::where('lawyer_id', $request->lawyer_id)->avg('rate');
            $lawyer_rate->update([
                'clint_rate' => $clientAvg,
            ]);

            $education_rate = $lawyer_rate->education_rate;
            $case_rate = $lawyer_rate->case_rate;
            $clint_rate = $lawyer_rate->clint_rate;
            $rate_array = [$education_rate, $case_rate, $clint_rate];
            $sum_rate = 0;
            foreach ($rate_array as $rate){
                if ($rate > 0){
                    $sum_rate += $rate;
                }
            }

            $average_rate = number_format((float)$sum_rate/3, 2);

            $lawyer_rate->update([
                'average_rate' => $average_rate,
            ]);
            return redirect()->back()->with('Rating Updated Successfully');
        }else{

            $exsitCLientRate = ClientRate::where([
                'user_id' => Auth::user()->id,
                'lawyer_id' => $request->lawyer_id,
            ])->first();
            if ($exsitCLientRate){
                $exsitCLientRate->update([
                    'rate' => $request->client_rate,
                ]);
            }else{
                ClientRate::create([
                    'user_id' => Auth::user()->id,
                    'lawyer_id' => $request->lawyer_id,
                    'rate' => $request->client_rate,
                ]);
            }

            $clientAvg = ClientRate::where('lawyer_id', $request->lawyer_id)->avg('rate');
            Rate::create([
                'registration_id' => $request->lawyer_id,
                'clint_rate' => $clientAvg,
                'average_rate' => number_format((float) $request->client_rate/3, 2),
            ]);
            return redirect()->back()->with('Successfully Submit Your Rating');
        }
    }
}
