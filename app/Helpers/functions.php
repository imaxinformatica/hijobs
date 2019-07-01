<?php

use App\State;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

function getStates()
{
    $states = State::all();
    return json_encode($states);
}

function validateFormation(Request $request)
{
    $request->validate([
        'name' => "required|max:191",
        'country_id' => "required",
        'state_id' => "",
        'level_id' => "required",
        'course_id' => "required",
        'situation' => "required",
        'start_month' => "required",
        'start_year' => "required",
        'finish_month' => "",
        'finish_year' => "",
        'candidate_id' => "",
    ]);
    $data = $request->except('_token', 'formation_id');
    return $data;
}

function validateProfessional(Request $request)
{
    $request->validate([
        'name' => "required|max:191",
        'occupation' => "required",
        'hierarchy_id' => "required",
        'description' => "required|max:2000",
        'country_id' => "required",
        'state_id' => "",
        'city_id' => "",
        'start_month' => "required",
        'start_year' => "required",
        'finish_month' => "",
        'finish_year' => "",
        'candidate_id' => "",
    ]);
    $data = $request->except('_token', 'professional_id');
    return $data;
}

function validateLanguage(Request $request)
{
    $request->validate([
        'language_id' => "required",
        'level' => "required",
        'candidate_id' => "",
    ]);
    $data = $request->except('_token', 'lang_id');
    return $data;
}

function validateKnowledge(Request $request)
{
    $request->validate([
        'knowledge_id' => "required",
        'subknowledge_id' => "required",
        'candidate_id' => "",
    ]);
    $data = $request->except('_token', 'know_id');

    return $data;
}

function validateCandidate(Request $request)
{
    $request->validate([
        'name' => "required|max:191",
        'phone' => "required",
        'cpf'   => "required",
    ]);

    if(!isset($request->candidate_id)){
        $request->validate([
            'password'  => "required|confirmed|min:6",
            'email' => "required|unique:candidates",
        ]);
    }else{
        $request->validate([
            'email'               => [
                'required',
                Rule::unique('candidates')->ignore($request->candidate_id)
            ],
        ]);
    }
    
    $data = $request->except('_token', 'candidate_id', 'thumbnail');
    if(isset($request->password)){
        $data['password'] =  bcrypt($request->password);
    }
    return $data;
}

function sortNameGenerate()
{
    $str = "";
    $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
    $max = count($characters) - 1;

    for ($i = 0; $i < 7; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}

function convertMoneyBraziltoUSA($value)
{
    $value = str_replace(',','.', str_replace('.','', $value));

    return $value;
}
function convertMoneyUSAtoBrazil($value)
{
    $value = number_format($value, 2, ',', '.');

    return $value;
}

function convertDateBraziltoUSA($date)
{
    $date = implode("-", array_reverse(explode("/", $date)));

    return $date;
}
function convertDateUSAtoBrazil($date)
{
    $date = implode("/", array_reverse(explode("-", $date)));

    return $date;
}


