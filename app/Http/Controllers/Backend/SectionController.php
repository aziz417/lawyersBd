<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ClassType;
use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        $sections = Section::with('createdUser', 'updatedUser', 'classType');

        if ($keyword) {

            $keyword = '%' . $keyword . '%';

            $sections = $sections->where('section_name', 'like', $keyword)
                ->orWhereHas('classType', function ($query) use ($keyword) {
                    $query->where('class_name', 'like', $keyword);
                });
        }

        $sections = $sections->latest()->paginate($perPage);
        $class_types = ClassType::all();

        return view('backend.pages.sections.index', compact('sections', 'class_types'));
    }


    public function create()
    {
        $classes = ClassType::latest()->get();
        return view('backend.pages.sections.create', compact('classes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'section_name' => 'required|max:255',
            'class_type' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $getData = Section::where('section_name', $request->section_name)
                ->where(['class_type_id' => $request->class_type])->first();
            if ($getData) {
                return redirect()->back()->with('warning', 'This sections already exist');
            }

            $request['class_type_id'] = $request->class_type;

            Section::create($request->all());

            DB::commit();

            return redirect()->back()->with('success', 'Sections created successfully');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }

    /*    public function show(Sections $Sections)
        {
            return view('backend.Sectionss.show', compact('Sections'));
        }*/


    public function edit(Section $section)
    {
        $classes = ClassType::latest()->get();
        return view('backend.pages.sections.edit', compact('section', 'classes'));
    }


    public function update(Request $request, Section $section)
    {
        $request->validate([
            'section_name' => 'required|max:255',
            'class_type' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $getData = Section::where('section_name', $request->section_name)
                ->where('class_type_id', $request->class_type)->first();

            if ($getData->id !== $section->id) {
                return redirect()->back()->with('warning', 'This section already exist');
            }

            $section->update([
                'section_name' => $request->section_name,
                'class_type_id' => $request->class_type
            ]);

            DB::commit();

            return redirect()->route('sections.index')->with('success', 'Section have been successfully updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }


    public function destroy(Section $section)
    {
        if ($section) {
            $section->delete();
            return redirect()->back()->with('success', 'Section have been successfully deleted');
        }
        abort(404);
    }
}
