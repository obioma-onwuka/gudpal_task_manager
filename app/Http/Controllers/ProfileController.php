<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    

    public function showProfile(){

        $isLogged = auth()->user();
        return view('dashboard.profile', compact('isLogged'));

    }

    public function showProfileForm(){

        $toEdit = auth()->user();
        return view('dashboard.profile-edit', compact('toEdit'));

    }

    public function saveProfileUpdate(Request $request){
        
        $userChecker = auth()->user();

        $request->validate([

            'name' => ['required', 'string', 'min:7', 'max:72'],
            'profile_dp' => ['image', 'mimes:jpg,png,tiff,jpeg,gif', 'max:2048', 'nullable'],
            'phone' => ['required', 'string', 'min:12', 'max:12']

        ]);

        $userChecker->name = strip_tags($request->name);
        $userChecker->phone = strip_tags($request->phone);

        if ($request->hasFile('profile_dp')){

            $imageFile = $request->file('profile_dp');
            $filename = Str::random(6) .'-' .time(). '-' .uniqid() .'.png';
            $storagePath = public_path('img/');

            $oldFile = $userChecker->avatar;

            // resize before storage
            Image::make($imageFile)->fit(360, 360)->encode('png')->save($storagePath . $filename);
            
            // Delete the old file

            $oldFilePath = public_path('img/') . $oldFile;
            if (File::exists($oldFilePath)) {

                if($oldFile != 'default.png'){
                    File::delete($oldFilePath);
                }
            }

            $userChecker->avatar = $filename;

        }

        $saveData = $userChecker->save();

        if( $saveData ){

            return redirect()->route('profile.show')->with('success', 'Profile has been updated successfully');

        }else{

            return back()->with('error', 'Something went wrong, try again later!');

        }

    }



    public function loadPasswordForm(){

        return view('dashboard.password-change');

    }

    public function password(Request $request){

        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', 'min:8', 'max:25', 'confirmed'],
            'new_password_confirmation' => 'required'
        ]);

        $userChecker = auth()->user();

        // Check if the current password matches the user's stored password
        if (!Hash::check($request->current_password, $userChecker->password)) {

            return back()->with('error', 'The current password is incorrect.');

        }

        // Update the user's password
        $userChecker->password = Hash::make($request->new_password);
        $toChange = $userChecker->save();

        if ($toChange){

            return back()->with('success', 'Your password has been changed successfully.');

        }else{

            return back()->with('error', 'Something went wrong, try again later');

        }

    }

}
