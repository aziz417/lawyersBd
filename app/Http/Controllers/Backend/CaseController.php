<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CaseRequest;
use App\Models\Cases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaseController extends Controller
{
    public function caseManage(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

//        $categories = Category::query();
//        if ($keyword) {
//
//            $keyword = '%' . $keyword . '%';
//
//            $categories = $categories->where('title', 'like', $keyword);
//        }
//
//        $categories = $categories->latest()->paginate($perPage);
//        $categories = $categories->latest()->paginate($perPage);
        if (Auth::user()->role == 'lawyer'){
            $cases = Auth::user()->cases()->latest()->paginate(10);
        }else{
            $cases = Auth::user()->userCases()->latest()->paginate(10);
        }

        return view('backend.pages.caseManage.index', compact('cases'));
    }

    public function caseStatusUpdate(Request $request){
        $caseId = $request->caseId;
        $caseStatus = $request->caseStatus;
        if(Cases::where('id', $caseId)->first()->update([
            'status' => $caseStatus
        ])){
            return true;
        }else{
            return false;
        }
    }

    public function caseDetails($id){
        $case = Cases::with('type', 'user')->where('id', $id)->first();
        return view('backend.pages.caseManage.details', compact('case'));
    }

    public function appliedCases(){
        if (Auth::user()->role == 'lawyer'){
            $submittedCases = Auth::user()->requestCases()->where('status', 'submitted')->get();
            return view('backend.pages.caseManage.submittedCaseIndex',
                compact('submittedCases'));

        }elseif (Auth::user()->role == 'user'){
            $cases = Cases::with('submittedLawyers')
                ->where('status', 'submitted')
                ->where('user_id', Auth::id())->get();
            return  view('backend.pages.caseManage.submittedCaseIndex', compact('cases'));
        }else{
            return redirect(url('/'))->with('warning', 'Please Login Lawyer Or User');
        }
    }
}
