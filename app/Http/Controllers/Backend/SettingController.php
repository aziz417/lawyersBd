<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Helpers\FileHandler;
use App\Models\Setting;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        $settings = Setting::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $settings = $settings->where('header_top_title', 'like', $keyword)
                ->orWhere('description_one', 'like', $keyword)
                ->orWhere('description_two', 'like', $keyword);
        }

        $settings = $settings->paginate($perPage);

        return view('backend.pages.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.pages.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            if ($request->file('logo')){
                $image = $request->file('logo');
                $logo_name = FileHandler::upload($image, 'logos', ['width' => '350', 'height' => '89']);
            }

            if ($request->file('footer_logo')){
                $footer_logo = $request->file('footer_logo');
                $footer_logo_name = FileHandler::upload($footer_logo, 'logos', ['width' => '350', 'height' => '89']);
            }

            $request['status'] = $request->status ? true : false;
            $onlyGo = $request->only(['header_top_title', 'description_one', 'description_two', 'status']);

            $setting = Setting::create($onlyGo);

            if ($request->file('logo')){
                $setting->image()->create([
                    'url' => Storage::url($logo_name),
                    'base_path' => $logo_name,
                    'type' => 'logo',
                ]);
            }
            if ($request->file('footer_logo')){
                $setting->image()->create([
                    'url' => Storage::url($footer_logo_name),
                    'base_path' => $footer_logo_name,
                    'type' => 'footer_logo',
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Setting Created Successfully');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Social $social
     * @return Response
     */
    public function show(Setting $setting)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Social $social
     * @return Response
     */
    public function edit(Setting $setting)
    {
        return view('backend.pages.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Social $social
     * @return Response
     */
    public function update(Request $request, Setting $setting)
    {
        DB::beginTransaction();

        try {
            if ($request->file('logo')){
                $image = $request->file('logo');
                $logo_name = FileHandler::upload($image, 'logos', ['width' => '350', 'height' => '89']);
                FileHandler::delete($setting->image()->where('type', 'logo')->first()->base_path ?? null);

                $setting->image()->where('type', 'logo')->first()->update([
                    'url' => Storage::url($logo_name),
                    'base_path' => $logo_name,
                    'type' => 'logo',
                ]);
            }

            if ($request->file('footer_logo')){
                $footer_logo = $request->file('footer_logo');
                $footer_logo_name = FileHandler::upload($footer_logo, 'logos', ['width' => '350', 'height' => '89']);
                FileHandler::delete($setting->image()->where('type', 'footer_logo')->first()->base_path ?? null);

                $setting->image()->where('type', 'footer_logo')->first()->update([
                    'url' => Storage::url($footer_logo_name),
                    'base_path' => $footer_logo_name,
                    'type' => 'footer_logo',
                ]);
            }

            $request['status'] = $request->status ? true : false;
            $onlyGo = $request->only(['header_top_title', 'description_one', 'description_two', 'status']);

            $setting->update($onlyGo);

            DB::commit();
            return redirect()->back()->with('success', 'Setting Update Successfully');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Social $social
     * @return Response
     */
    public function destroy(Setting $setting)
    {
        if ($setting->image){
            FileHandler::delete($setting->image()->where('type', 'logo')->first()->base_path);
            $setting->image()->where('type', 'logo')->first()->delete();

            FileHandler::delete($setting->image()->where('type', 'footer_logo')->first()->base_path);
            $setting->image()->where('type', 'footer_logo')->first()->delete();
        }
        $setting->delete();
        return redirect()->back()->with('success', 'Setting Deleted Successfully');

    }

    public function changeStatus(Setting $setting)
    {
        $setting->update(['status' => !$setting->status]);
        return response()->json(['status' => true]);
    }
}
