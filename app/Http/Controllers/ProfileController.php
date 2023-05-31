<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    // Index view
    public function index($id){
        $user = User::find($id);

        return view('profile.profile', compact('user'));
    }

    // Update profile
    public function update(Request $request, User $user){
        $userId = Auth::user()->id;
        $validation = $request->validate([
            'name' => 'required|max:45',
            // 'username' => 'required|max:20|unique:users,username' . $user->id,
            // 'email' => 'required|email:dns|unique:users,email' . $user->email,
            // 'profession' => 'min',
            // 'description'=> 'required',
            // 'instagram' => 'required',
            // 'whatsapp' => 'required',
            // 'picture' => 'file|image'
        ]);
        
        // Image processing
        if ($request->hasFile('picture')) {
            // slug helper
            $slug = Str::slug($request['username']);

            // mengambil file extension
            $extFile = $request->profile_picture->getClientOriginalExtension();

            // generate nama image
            $fileName = $slug . '-' . time() . "." . $extFile;

            // proses simpan ke storage
            $request->profile_picture->storeAs('public/profile', $fileName);
        } else {
            // default pict
            $fileName = 'default_profile.jpg';
        }

        $validation['picture'] = $fileName;

        $user->update($validation);

        return redirect()->route('profile.index', ['id' => $userId])->with('success', 'Edit Profile Success!');
    }

    // Update user 2
    public function updating(Request $request, $id){
        $user = User::find($id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->profession = $request->profession;
        $user->description = $request->description;
        $user->instagram = $request->instagram;
        $user->whatsapp = $request->whatsapp;
        // $user->picture = $request->picture;

        // Image processing
        if ($request->hasFile('picture')) {
            // slug helper
            $slug = Str::slug($request['username']);

            // mengambil file extension
            $extFile = $request->picture->getClientOriginalExtension();

            // generate nama image
            $fileName = $slug . '-' . time() . "." . $extFile;

            // proses simpan ke storage
            $request->picture->storeAs('public/profile', $fileName);
            
            $user->picture = $fileName;
        }


        $user->save();

        return redirect()->route('profile.index', ['id' => $user->id])->with('success', 'Edit Profile Success!');        
    }
}
