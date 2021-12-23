<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CaseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaseTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        $caseTypes = CaseType::query();

        if ($keyword) {

            $keyword = '%' . $keyword . '%';

            $caseTypes = $caseTypes->where('title', 'like', $keyword);
        }

        $caseTypes = $caseTypes->latest()->paginate($perPage);

        return view('backend.pages.caseTypes.index', compact('caseTypes'));
    }


    public function create()
    {
        return view('backend.pages.caseTypes.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'caseType' => 'required',
        ]);

        DB::beginTransaction();
        try {

            CaseType::create([
                'user_id' => auth()->id(),
                'title' => $request->caseType,
            ]);
            DB::commit();

            return redirect()->back()->with('success', 'Case Type created successfully');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }

    /*    public function show(caseTypes $caseTypes)
        {
            return view('backend.caseTypess.show', compact('caseTypes'));
        }*/


    public function edit(CaseType $caseType)
    {
        return view('backend.pages.caseTypes.edit', compact('caseType'));
    }


    public function update(Request $request, $id)
    {
        $CaseType = CaseType::where('id', $id)->first();
        $request->validate([
            'caseType' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $CaseType->update([
                'title' => $request->caseType,
            ]);

            DB::commit();

            return redirect()->route('caseTypes.index')->with('success', 'Case Type have been successfully updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }


    public function destroy($id)
    {
        $CaseType = CaseType::where('id', $id)->first();

        if ($CaseType) {
            $CaseType->delete();
            return redirect()->back()->with('success', 'Case Type have been successfully deleted');
        }
        abort(404);
    }
}
