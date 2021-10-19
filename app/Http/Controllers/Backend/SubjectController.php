<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ClassType;
use App\Models\District;
use App\Models\Division;
use App\Models\Institute;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        $subjects = Subject::with('createdUser', 'updatedUser', 'section', 'classType');

        if ($keyword) {

            $keyword = '%' . $keyword . '%';

            $subjects = $subjects->where('subject_name', 'like', $keyword)
                ->orWhereHas('section', function ($query) use ($keyword) {
                    $query->where('section_name', 'like', $keyword);
                });
        }

        $subjects = $subjects->latest()->paginate($perPage);


        return view('backend.pages.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $sections = Section::latest()->get();
        $classNames = ClassType::latest()->get();
        return view('backend.pages.subjects.create', compact('sections', 'classNames'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|max:255',
            'section_name' => 'required',
            'class_name' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $getData = Subject::where('subject_name', $request->subject_name)
                ->where(['section_id' => $request->section_name])->first();
            if ($getData) {
                return redirect()->back()->with('warning', 'This subject already exist');
            }

            $request['class_id'] = $request->class_name;
            $request['section_id'] = $request->section_name;

            subject::create($request->all());

            DB::commit();

            return redirect()->back()->with('success', ' Subject created successfully');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }

    /*    public function show(subject $subject)
        {
            return view('backend.subjects.show', compact('subject'));
        }*/


    public function edit(subject $subject)
    {
        $sections = Section::latest()->get();
        $classNames = ClassType::latest()->get();
        return view('backend.pages.subjects.edit', compact('subject', 'sections', 'classNames'));
    }


    public function update(Request $request, subject $subject)
    {
        $request->validate([
            'subject_name' => 'required|max:255',
            'class_name' => 'required',
            'section_name' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $getData = Subject::where('subject_name', $request->subject_name)
                ->where('section_id', $request->section_name)->where('class_id', $request->class_name)->first();

            if ($getData->id !== $subject->id) {
                return redirect()->back()->with('warning', 'This subject already exist');
            }

            $subject->update([
                'subject_name' => $request->subject_name,
                'section_id' => $request->section_name,
                'class_id' => $request->class_name
            ]);

            DB::commit();

            return redirect()->route('subjects.index')->with('success', 'subject have been successfully updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }


    public function destroy(Subject $subject)
    {
        if ($subject) {
            $subject->delete();
            return redirect()->back()->with('success', 'Subject have been successfully deleted');
        }
        abort(404);
    }
}
