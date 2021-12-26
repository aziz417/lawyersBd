<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Rate;
use App\Models\User;
use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function rateShow(){
        $lawyer = Auth::user();
        return view('backend.pages.rating.manageRating', compact('lawyer'));
    }

    public function ratingCalculation(){
        // education case calculation
        $register = Auth::user()->register;
        $examTypes = ['ssc_result', 'hsc_result', 'graduation_result', 'masters_result'];
        $get_result = 0;
        $number_of_exam = 0;
        foreach ($examTypes as $examType){
            if (!empty($register[$examType])){
                $number_of_exam++;
                $get_result += $this->getResult($register[$examType]);
            }
        }
        if ($get_result){
            $education_rate = number_format((float)$get_result/$number_of_exam, 2);
        }else{
            $education_rate = 0;
        }

        // case rate calculation
        $cases = Auth::user()->cases()->get();
        $caseRate = 0;
        $number_of_case = 0;
        foreach ($cases as $case){
            $number_of_case++;
            $caseRate += $case->status;
        }
        if ($caseRate){
            $caseRate = number_format((float)$caseRate/$number_of_case, 2);
        }else{
            $caseRate = 0;
        }

        // client rate calculation
        if (Auth::user()->rate){
            $client_rate = Auth::user()->rate->clint_rate;
        }else{
            $client_rate = 0;
        }

        // average rate
        $rate_array = [$education_rate, $caseRate, $client_rate];
        $rate_item = 0;
        $sum_rate = 0;
        foreach ($rate_array as $rate){
            if ($rate > 0){
                $rate_item++;
                $sum_rate += $rate;
            }
        }
        if ($rate_item){
            $average_rate = number_format((float)$sum_rate/3, 2);
        }else{
            $average_rate = 0;
        }
        $lawyer_rate = Rate::where('registration_id', auth()->id())->first();
        if ($lawyer_rate){
            $lawyer_rate->update([
                'registration_id' => Auth::user()->id,
                'case_rate' => $caseRate,
                'clint_rate' => $client_rate,
                'education_rate' => $education_rate,
                'average_rate' => $average_rate,
                'status' => true,
            ]);
        }else{
            Auth::user()->rate()->create([
                'registration_id' => Auth::user()->id,
                'case_rate' => $caseRate,
                'clint_rate' => $client_rate,
                'education_rate' => $education_rate,
                'average_rate' => $average_rate,
                'status' => true,
            ]);
        }
        return redirect()->back()->with('Update Your Rating System');
    }

    public function getResult($result){
        $result_category = ['1st Class', '2nd Class', '3rd Class'];

        if (in_array($result, $result_category)){
            if ($result == '1st Class'){
                return number_format((float)5, 2);
            }elseif ($result == '2nd Class'){
                return number_format((float)3.50, 2);
            }elseif ($result == '3rd Class'){
                return number_format((float)2, 2);
            }
        }else{
           $explode_result = explode("(", $result);
           $out_of_result = explode(")", $explode_result[1]);
           if (!empty($explode_result[0])){
               if ($out_of_result[0] == 'Out of 5'){
                   return number_format((float)$explode_result[0], 2);
               }elseif ($out_of_result[0] == 'Out of 4'){
                   return number_format((float)$explode_result[0]+1, 2);
               }
           }

        }
    }
}
