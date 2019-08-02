<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\State;
use App\Country;
use App\OccupationArea;

class CompanyController extends Controller
{
    public function edit($id)
    {
    	$company = Company::find($id);
    	return view('admin.pages.company.edit')
    	->with('states', State::all())
        ->with('countries', Country::all())
        ->with('occupations', OccupationArea::all())
    	->with('company', $company);
    }
    public function update(Request $request)
    {

        $this->validate($request, [
            'trade'                 => 'required',
            'phone'                 => 'required',
            'description'           => 'required|max:500',
            'cnpj'                  => 'required',
            'occupation_area_id'    => 'required',
            'cep'                   => 'required',
        ]);
        $company                       = Company::find($request->id);
        $company->trade                = $request->trade;
        $company->phone                = $request->phone;
        $company->description          = $request->description;
        $company->cnpj                 = $request->cnpj;
        $company->occupation_area_id   = $request->occupation_area_id;
        $company->cep                  = $request->cep;
        $company->street               = $request->street;
        $company->neighborhood         = $request->neighborhood;
        $company->city                 = $request->city;
        $company->state                = $request->state;
        $company->number               = $request->number;
        if ($request->name != null ||  $request->name != '') {
            $company->name             = $request->name;
        }
        if ($request->email != null || $request->email != '') {
            $company->email            = $request->email;
        }
        $company->linkedin            = $request->linkedin;
        $company->facebook            = $request->facebook;
        $company->twitter             = $request->twitter;
        $company->blog                = $request->blog;
        $company->save();

        return redirect()->back()->with('success','Empresa Salva com sucesso!');
    }
}
