<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Formation;

class FormationController extends Controller
{

    public function store(Request $request)
    {
        $data = validateFormation($request);
        Formation::create($data);
        return redirect()->back()->with('success', "Formação Incluída");
        
    }

    public function update(Request $request)
    {
        $data = validateFormation($request);
        Formation::find($request->formation_id)->update($data);
        return redirect()->back()->with('success', "Formação Alterada");
    }

    public function delete(Formation $formation)
    {
        $formation->delete();
        return redirect()->back()->with('info', "Formação Removida");

    }

}
