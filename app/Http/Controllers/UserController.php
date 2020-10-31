<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller{

    public function show(Request $request) {
        $user = Auth::user();
        return view('user.change_profile', ['user' => $user]);
    }
  
    public function update(Request $request) {
    	$request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'self_photo' => ['required'],
            // 'id_photo' =>['required'],
        ]);

        User::where('id', Auth::user()->id)->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'address' => $request['address'],
            'phone_number' => $request['phone'],
        ]);

        return redirect()->back()->with('success', 'Profilul a fost actualizat cu succes!');
 	}

}