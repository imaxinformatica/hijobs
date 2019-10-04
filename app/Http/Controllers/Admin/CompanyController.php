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
        $data = $request->all();
        $data['special_company'] = request()->has('special_company') ? 1 : null;
        $company->update($data);

        return redirect()->back()->with('success','Empresa Salva com sucesso!');
    }
}
