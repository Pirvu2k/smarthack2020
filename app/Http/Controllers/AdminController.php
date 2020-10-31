<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;

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
}
