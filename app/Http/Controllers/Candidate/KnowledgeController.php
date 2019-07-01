<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CandidateKnowledge;

class KnowledgeController extends Controller
{
    public function store(Request $request)
    {
        $data = validateKnowledge($request);
        CandidateKnowledge::create($data);
        return redirect()->back()->with('success', 'Conhecimento de informática incluído');

    }

    public function update(Request $request)
    {
        $data = validateKnowledge($request);
        CandidateKnowledge::find($request->know_id)->update($data);
        return redirect()->back()->with('success', 'Conhecimento de informática editado');
        
    }

    public function delete(CandidateKnowledge $knowledge)
    {
        $knowledge->delete();
        return redirect()->back()->with('info', 'Conhecimento de informática removido');
    }
}
