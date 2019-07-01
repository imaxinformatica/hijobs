<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CandidateLanguage;

class LanguageController extends Controller
{
    public function store(Request $request)
    {
        $data = validateLanguage($request);
        CandidateLanguage::create($data);
        return redirect()->back()->with('success', 'Idioma incluído');

    }

    public function update(Request $request)
    {
        $data = validateLanguage($request);
        CandidateLanguage::find($request->lang_id)->update($data);
        return redirect()->back()->with('success', 'Idioma editado');
        
    }

    public function delete(CandidateLanguage $language)
    {
        $language->delete();
        return redirect()->back()->with('info', 'Idioma removido');
    }
}
