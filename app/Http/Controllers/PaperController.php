<?php

namespace App\Http\Controllers;

use App\UserDocument;
use Illuminate\Http\Request;
use App\Document;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;
use Spipu\Html2Pdf\Html2Pdf;

class PaperController extends Controller
{
    public function create(Request $request) {
        return view('paper.create');
    }

    public function pdf($doc, $content) {
        $html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array(16, 16, 12, 8), true);
        $html2pdf->writeHTML($content);
        $doc_name = $doc->title . Auth::user()->first_name . Auth::user()->last_name . Carbon::now()->timestamp . '.pdf';
        $saved_path = "documents/" . $doc_name;
        $name = storage_path("app/public/") . $saved_path;
        $html2pdf->output($name, 'F');
        $path = str_replace("public/", "", $saved_path);

        $new_doc = new UserDocument();
        $new_doc->name = $doc_name;
        $new_doc->path = $path;
        $new_doc->user_id = Auth::user()->id;
        $new_doc->document_id = $doc->id;
        $new_doc->save();
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

        $this->pdf($doc, $content);

        return redirect('home');
    }

    public function list(Request $request) {
        $userDocuments = UserDocument::where('user_id', Auth::user()->id)->get();

        return view('paper.list', ['userDocuments' => $userDocuments]);
    }
}
