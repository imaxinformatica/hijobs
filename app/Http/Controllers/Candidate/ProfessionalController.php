<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Professional;

class ProfessionalController extends Controller
{
    public function store(Request $request)
    {
        $data = validateProfessional($request);
        Professional::create($data);
        return redirect()->back()->with('success', "Experiência Profissional Incluída");
        
    }

    public function update(Request $request)
    {
        $data = validateProfessional($request);
        if($request->actually == 1){
            $data['finish_month'] = null;
            $data['finish_year'] = null;
        }
        Professional::find($request->professional_id)->update($data);
        return redirect()->back()->with('success', "Experiência Profissional Alterada");
    }

    public function delete(Professional $professional)
    {
        $professional->delete();
        return redirect()->back()->with('info', "Experiência Profissional Removida");

    }
}
