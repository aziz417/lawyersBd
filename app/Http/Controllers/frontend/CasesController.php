<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\CaseRequest;
use App\Models\Cases;
use App\Models\CaseType;
use App\Models\RequestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CasesController extends Controller
{
    public function CaseStore(Request $request){
        DB::beginTransaction();
        try {
            $slug = Str::slug($request->title).'-'.time();
            $fileName = 'file not found';
            if ($request->hasFile('documentation')) {
                $fileName = 'case-'.time().'.'.$request->documentation->extension();
                $request->documentation->move(public_path('uploads/documentations'), $fileName);
            }
            $case = Cases::create([
                'case_type_id' => $request->caseTypeId,
                'user_id'      => Auth()->user()->id,
                'lawyer_id'    => $request->lawyer_id,
                'title'        => $request->title,
                'caseDate'     => $request->caseDate,
                'coteDate'     => $request->coteDate,
                'document'     => $fileName,
                'status'       => $request->submitted_case ?? '',
                'slug'         => $slug,
                'description'  => $request->description,
            ]);

            DB::commit();

            return redirect()->back()->with('success', ' Case Submitted successfully');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function create(){

        $caseTypes = CaseType::all();
        if (Auth::check()){
            if (Auth::user()->role == 'lawyer'){
                $cases = Cases::where('status', 'submitted')->get();
                $newCases = $cases->filter(function ($case){
                    $exsitCase = CaseRequest::where(['case_id' => $case->id, 'lawyer_id' => Auth::user()->id])->first();
                    if (!$exsitCase){
                        return $case;
                    }
                });
                $submittedCases = Auth::user()->requestCases()->where('status', 'submitted')->get();
                return  view('frontend.pages.CaseOrGd',
                    compact('caseTypes', 'submittedCases', 'newCases'));

            }elseif (Auth::user()->role == 'user'){
                $cases = Cases::with('submittedLawyers')
                    ->where('status', 'submitted')
                    ->where('user_id', Auth::id())->get();
                return  view('frontend.pages.CaseOrGd', compact('caseTypes', 'cases'));
            }else{
                return redirect(url('/'))->with('warningMsg', 'Please Login Lawyer Or User');
            }
        }else{
            return redirect(url('/'))->with('warningMsg', 'Please First Login');
        }
    }

    public function caseApply($id){
        if (!Auth::check()){
            return redirect()->back()->with('warningMsg', ' Please Lawyer Login And Try Again');
        }

        if (Auth::check() && Auth::user()->role != 'lawyer'){
            return redirect()->back()->with('warningMsg', ' Please Lawyer Login And Try Again');
        }
        CaseRequest::create([
            'case_id' => $id,
            'lawyer_id' => Auth::id(),
        ]);
        return redirect()->back()->with('success', ' Case Applied Successfully');
    }

    public function appliedCaseDetails($id){
        $case = Cases::with('submittedLawyers', 'register')->where('id', $id)->first();
        return view('frontend.pages.caseDetails', compact('case'));
    }

    public function lawyerHire($case, $lawyer){
        $case = Cases::where('id', $case)->first();
        $case->update([
            'status' => 1,
            'lawyer_id' => $lawyer,
        ]);
        $cases = CaseRequest::where('case_id', $case)->get();
        $caseCheck = CaseRequest::where('case_id', $case)->first();
        if ($caseCheck){
            foreach ($cases as $case){
                $case->delete();
            }
        }
        return redirect()->route('case.create')->with('success', 'Case Submitted Successfully');
    }
}
