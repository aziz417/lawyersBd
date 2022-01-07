<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\AdminPasswordRequest;
use App\Http\Requests\AdminProfileRequest;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function profile()
    {
        $user = User::where('id', auth()->id())->first();
        $userRegister = Auth::user()->register;
        return view('backend.pages.profile.profile', compact('user', 'userRegister'));
    }

    public function profileUpdate(UserProfileRequest $request, User $user)
    {
//        dd($request->all());
        DB::beginTransaction();
        try {
            $userRegister = Auth::user()->register;
            if ($request->file('profile_image')) {

                $image = $request->file('profile_image');
                $image_path = FileHandler::upload($image, 'profile', ['width' => '160', 'height' => '160']);
                $oldImage = $userRegister->image()->where('type', 'profile')->first();

                if($oldImage) {
                    FileHandler::delete($userRegister->image()->where('type', 'profile')->first()->base_path); //image delete
                    $oldImage->update([ // image update
                        'url' => Storage::url($image_path),
                        'base_path' => $image_path,
                        'type' => 'profile',
                    ]);
                }else{
                    if ($request->file('profile_image')) {
                        $userRegister->image()->create([
                            'url' => Storage::url($image_path),
                            'base_path' => $image_path,
                            'type' => 'profile',
                        ]);
                    }
                }
            }
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            $userRegister->update([
                'applicants_name' => $request->name,
                'email' => $request->email,
                'image' => $image_path ? Storage::url($image_path) : '',
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Profile Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function changePassword(UserPasswordRequest $request)
    {
        $hasPassword = Auth::user()->password;
        $userRegister = Auth::user()->register;
        $check_password = Hash::check($request->current_password, $hasPassword);
        if ($check_password) {
            $new_password = Hash::make($request->password);
            User::where('id', Auth::id())->update(['password' => $new_password]);
            $userRegister->update([
                'password' => $new_password,
            ]);
            return redirect()->back()->with('success', 'Password successfully changed');
        } else {
            return redirect()->back()->with('warning', 'Your password dose not match with current password');
        }
    }
}
