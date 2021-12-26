<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CaseType;
use App\Models\Rate;
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
        $lawyer = Registration::with('category')->where('id', $id)->first();
        return view('frontend.pages.LawyerDetails', compact('lawyer'));
    }

    public function rateSubmit(Request $request){
        if (!Auth::check()){
            return back()->with('warningMsg', 'First Login Then Submit Your Rate');
        }
        $lawyer_rate = Rate::where('registration_id',$request->lawyer_id)->first();
        if ($lawyer_rate){
            $lawyer_rate->update([
                'clint_rate' => $request->client_rate,
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
            Rate::create([
                'registration_id' => $request->lawyer_id,
                'clint_rate' => $request->client_rate,
                'average_rate' => number_format((float) $request->client_rate/3, 2),
            ]);
            return redirect()->back()->with('Successfully Submit Your Rating');
        }
    }
}
