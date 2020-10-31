<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use Spipu\Html2Pdf\Html2Pdf;

class PaperController extends Controller
{
    public function create(Request $request) {
        return view('paper.create');
    }

    public function pdf($id) {
        $document = Document::find($id);
        $html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array(16, 16, 12, 8), true);
        $html2pdf->writeHTML($document->content);
        return $html2pdf->output($document->title.'.pdf');
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
