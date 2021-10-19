<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ClassType;
use App\Models\Institute;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstituteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        $institutes = Institute::with('createdUser', 'updatedUser', 'classType');

        if ($keyword) {

            $keyword = '%' . $keyword . '%';

            $institutes = $institutes->where('institute_name', 'like', $keyword)
                ->orWhereHas('classType', function ($query) use ($keyword) {
                    $query->where('class_name', 'like', $keyword);
                });
        }

        $institutes = $institutes->latest()->paginate($perPage);
        $class_types = ClassType::all();

        return view('backend.pages.institutes.index', compact('institutes', 'class_types'));
    }


    public function create()
    {
        $classes = ClassType::latest()->get();
        $upazilas = Upazila::orderBy('id', 'DESC')->get();
        return view('backend.pages.institutes.create', compact('classes', 'upazilas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'institute_name' => 'required|max:255',
            'class_type' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $getData = Institute::where('institute_name', $request->institute_name)
                ->where(['class_type_id' => $request->class_type])->first();
            if ($getData) {
                return redirect()->back()->with('warning', 'This institute already exist');
            }

            $request['class_type_id'] = $request->class_type;

            Institute::create($request->all());

            DB::commit();

            return redirect()->back()->with('success', ' Institute created successfully');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }

    /*    public function show(Institute $institute)
        {
            return view('backend.institutes.show', compact('institute'));
        }*/


    public function edit(Institute $institute)
    {
        $classes = ClassType::latest()->get();
        return view('backend.pages.institutes.edit', compact('institute', 'classes'));
    }


    public function update(Request $request, Institute $institute)
    {
        $request->validate([
            'institute_name' => 'required|max:255',
            'class_type' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $getData = Institute::where('institute_name', $request->institute_name)
                ->where('class_type_id', $request->class_type)->first();

            if ($getData->id !== $institute->id) {
                return redirect()->back()->with('warning', 'This institute already exist');
            }

            $institute->update([
                'institute_name' => $request->institute_name,
                'class_type_id' => $request->class_type
            ]);

            DB::commit();

            return redirect()->route('institutes.index')->with('success', 'Institute have been successfully updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }


    public function destroy(Institute $institute)
    {
        if ($institute) {
            $institute->delete();
            return redirect()->back()->with('success', 'Institute have been successfully deleted');
        }
        abort(404);
    }

}
