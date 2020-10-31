<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function list(Request $request) {
        $companies = Company::all();

        return view('admin.companies', ['companies' => $companies]);
    }

    public function show($company_id) {
        $company = Company::find($company_id);

        return view('admin.company', ['company' => $company]);
    }
}
