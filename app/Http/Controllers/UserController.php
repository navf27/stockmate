<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('Asia/Jakarta');

class UserController extends Controller
{
    // Index user
    public function index(){
        $user = User::all();
        $userku = Auth::user()->picture;

        return view('admin.master.user.user', compact('user', 'userku'));
    }

    // Store user
    public function store(Request $request){
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/users')->with('success', 'Add user success!');
    }

    // Update user
    public function update(Request $request, $id){
        $user = User::find($id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->updated_at = date('Y-m-d H:i:s');

        $user->save();

        return redirect('/users')->with('success', 'Edit user success!');
    }

    // Delete user
    public function destroy($id){
        $user = User::find($id);

        $user->delete();

        return redirect('/users')->with('success', 'Delete user success!');
    }
}
