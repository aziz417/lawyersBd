<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\CaseType;
use Illuminate\Http\Request;
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
            Cases::create([
                'case_type_id' => $request->caseTypeId,
                'user_id'      => Auth()->user()->id,
                'lawyer_id'    => $request->lawyer_id,
                'title'        => $request->title,
                'caseDate'     => $request->caseDate,
                'coteDate'     => $request->coteDate,
                'document'     => $fileName,
                'status'       => 1,
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
        $cases = Cases::all();
        return  view('frontend.pages.CaseOrGd', compact('caseTypes', 'cases'));
    }
}
