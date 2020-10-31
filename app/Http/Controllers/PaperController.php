<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;

class PaperController extends Controller
{
    public function create(Request $request) {
        return view('paper.create');
    }

    public function addPaper(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'company' => 'required'
        ]);

        $document = new Document;
        $document->title = $request->title;
        $document->content = $request->input('content');
        $document->company_id = $request->company;
        $document->save();

        return redirect()->back()->with('success', "Document adaugat cu succes!");
    }

}
