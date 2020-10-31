<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Company;
use App\User;

class AdminController extends Controller
{
    public function list(Request $request) {
        $companies = Auth::user()->companies;

        return view('admin.companies', ['companies' => $companies]);
    }

    public function showCompany($company_id) {
        $company = Company::with('documents')->find($company_id);

        return view('admin.company', ['company' => $company]);
    }

    public function pendingUsers(Request $request) {
        $users = User::where('confirmed', 0)->get();

        return view('admin.pendingUsers', ['users' => $users]);
    }

    public function pendingUser($user_id) {
        $user = User::find($user_id);

        if($user->confirmed) {
            return redirect()->back();
        }

        return view('admin.viewUser', ['user' => $user]);
    }

    public function activateUser($user_id) {
        $user = User::find($user_id);
        $user->confirmed = 1;
        $user->save();

        return Response::json("", 200);
    }
}
