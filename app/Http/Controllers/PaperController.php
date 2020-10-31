<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;

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

    public function showPaper(Request $request, Document $doc) {
        $data['paper'] = $doc;

        $matches = $doc->getFields();
        $content = $doc->content;

        $fields = array("{first_name}", "{last_name}", "{phone_number}", "{address}");
        $changed_fields   = array("<input type=\"text\" name=\"first_name\" required readonly value=\"".Auth::user()->first_name."\">",
                                    "<input type=\"text\" name=\"last_name\" required readonly value=\"".Auth::user()->last_name."\">",
                                    "<input type=\"text\" name=\"phone_number\" required readonly value=\"".Auth::user()->phone_number."\">",
                                    "<input type=\"text\" name=\"address\" required readonly value=\"".Auth::user()->address."\">");

        $content = str_replace($fields, $changed_fields, $content);

        foreach ($matches as $matches_array) {
            foreach ($matches_array as $match) {
                $content = str_replace($match[0], "<input type=\"text\" required name=\"" . trim($match[0], "{}") . "\">", $content);
            }
        }

        $data['content'] = $content;

        return view('paper.completePaper', $data);
    }

    public function submitPaper(Request $request, Document $doc) {
        $content = $doc->content;

        foreach ($request->all() as $key => $value) {
            $content = str_replace('{' . $key . '}', $value, $content);
        }



        return redirect('home');
    }

}
