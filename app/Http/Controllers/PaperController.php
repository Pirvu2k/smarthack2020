<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function create(Request $request) {
        return view('paper.create');
    }

    public function addPaper(Request $request) {
        dd($request->all());

        return redirect()->back();
    }

}
