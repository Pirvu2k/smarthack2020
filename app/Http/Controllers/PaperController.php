<?php

namespace App\Http\Controllers;

use App\AdditionalFile;
use App\UserAdditionalFile;
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

        return $new_doc;
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

        if ($request['additional_files'] != null) {
            $additional_files = explode(",", $request['additional_files']);

            foreach ($additional_files as $file) {
                $instance_of_file = new AdditionalFile();
                $instance_of_file->name = str_replace(" ","_",trim($file));
                $instance_of_file->document_id = $document->id;
                $instance_of_file->save();
            }
        }

        return redirect()->back()->with('success', "Document adaugat cu succes!");
    }

    public function getSeriesNumber($company) {
        $count = 0;
        foreach($company->documents as $document) {
            $count += $document->userDocuments->count();
        };
        return $count+1;
    }

    public function showPaper(Request $request, Document $doc) {
        $data['paper'] = $doc;

        $matches = $doc->getFields();
        $content = $doc->content;

        $fields = array("{first_name}", "{last_name}", "{phone_number}", "{address}", "{today_date}", "{series_number}");
        $changed_fields   = array("<input type=\"text\" name=\"first_name\" required readonly value=\"".Auth::user()->first_name."\">",
                                    "<input type=\"text\" name=\"last_name\" required readonly value=\"".Auth::user()->last_name."\">",
                                    "<input type=\"text\" name=\"phone_number\" required readonly value=\"".Auth::user()->phone_number."\">",
                                    "<input type=\"text\" name=\"address\" required readonly value=\"".Auth::user()->address."\">",
                                    "<input type=\"text\" name=\"today_date\" required readonly value=\"".Carbon::now()->format('d.m.Y')."\">",
                                    "<input type=\"text\" name=\"series_number\" required readonly value=\"".$this->getSeriesNumber($doc->company)."\">",
                                );

        $content = str_replace($fields, $changed_fields, $content);

        foreach ($matches as $matches_array) {
            foreach ($matches_array as $match) {
                if (trim($match[0], "{} ") != "signature") {
                    $content = str_replace($match[0], "<input type=\"text\" required name=\"" . trim($match[0], "{} ") . "\">", $content);
                } else {
                    $content = str_replace($match[0], "<input type=\"text\" value=\"signature\" required readonly name=\"" . trim($match[0], "{} ") . "\">", $content);
                }
            }
        }

        $data['content'] = $content;

        $data['additional_files'] = $doc->additionalFiles;

        return view('paper.completePaper', $data);
    }

    public function submitPaper(Request $request, Document $doc) {
        $content = $doc->content;

        foreach ($request->all() as $key => $value) {
            if ($key != "signature") {
                $content = str_replace('{' . $key . '}', $value, $content);
            } else {
                $sign = md5(Auth::user()->first_name . Auth::user()->last_name . Carbon::now()->timestamp);
                $img = "<img src=\"https://chart.googleapis.com/chart?chs=70x70&cht=qr&chl=" . $sign . "\" title=\"Link to Google.com\" />  <p style=\"margin: 0px; padding :0px\"> " . Auth::user()->getFullName() . " </p><br> <p style=\"margin: 0px; padding :0px\">Certified by Digi Scriptum</p>";
                $content = str_replace('{' . $key . '}', $img, $content);
            }
        }

        $new_doc = $this->pdf($doc, $content);

        foreach ($doc->additionalFiles as $file) {
            $picture_path = $request['file_' . $file->id]->store('public/additionalFiles');
            $picture_path = str_replace("public/", "", $picture_path);

            $instance_of_new_file = new UserAdditionalFile();
            $instance_of_new_file->additional_file_id = $file->id;
            $instance_of_new_file->name = $file->name . Auth::user()->getFullName();
            $instance_of_new_file->user_id = Auth::user()->id;
            $instance_of_new_file->path = $picture_path;
            $instance_of_new_file->user_document_id = $new_doc->id;
            $instance_of_new_file->save();
        }

        Auth::user()->companiesContracts()->attach($doc->company->id);

        return redirect('home');
    }

    public function list(Request $request) {
        $userDocuments = UserDocument::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('paper.list', ['userDocuments' => $userDocuments]);
    }

    public function update(Request $request, Document $doc) {
        $data['paper'] = $doc;
        return view('paper.update', $data);
    }

    public function updateDoc(Request $request, Document $doc) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'company' => 'required'
        ]);

        $document = Document::find($doc->id);
        $document->title = $request->title;
        $document->content = $request->input('content');
        $document->company_id = $request->company;
        $document->save();

        return redirect()->back()->with('success', "Document modificat cu succes!");
    }
}
