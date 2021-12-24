<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SlidersController extends Controller
{

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all slider
        $sliders = Slider::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $sliders = $sliders->where('title', 'like', $keyword);
        }

        $sliders = $sliders->paginate($perPage);

        //Show All Slides
        return view('backend.pages.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.pages.slider.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $slider = Slider::create([
                'title' => $request->title,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'sliders', ['width' => '1200', 'height' => '500']);
            }

            $slider->image()->create([
                'url' => Storage::url($image_name),
                'base_path' => $image_name,
                'type' => 'lg',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Slider Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(Slider $slider)
    {
        return view('backend.pages.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        DB::beginTransaction();

        try {

            $slider->update([
                'title' => $request->title,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'sliders', ['width' => '1200', 'height' => '500']);

                FileHandler::delete($slider->image->base_path);

            }else{
                $image_name = $slider->image->base_path;
            }

            $slider->image()->update([
                'url' => Storage::url($image_name),
                'base_path' => $image_name,
                'type' => 'lg',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Slider Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(Slider $slider)
    {
        DB::beginTransaction();

        try {

            FileHandler::delete($slider->image->base_path);

            $slider->delete();

            DB::commit();

            return redirect()->route('sliders.index')->with('success', 'Slider Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('sliders.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus(Slider $slider)
    {
        $slider->update(['status' => !$slider->status]);
        return response()->json(['status' => true]);
    }
}
