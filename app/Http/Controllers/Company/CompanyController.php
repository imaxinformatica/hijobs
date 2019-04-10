<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Company;
use App\Country;
use App\State;
use App\Driver;
use App\Vehicle;
use App\Journey;
use App\Special;
use App\Language;
use App\Knowledge;
use App\Subknowledge;
use App\Hierarchy;
use App\ContractType;
use App\Opportunity;
use Auth;

class CompanyController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'             => 'required|max:50|unique:companies',
            'opportunity'        => 'required'
        ]);
        $company = new Company;
        $company->name 		  = "Holy Imports";
        $company->email       = $request->email;
        $company->password    = bcrypt(123456);

        $company->save();

        $opportunity = new Opportunity;
        $opportunity->name 			= $request->opportunity;
        $opportunity->company_id 	= $company->id;

        $opportunity->save();

        Auth::guard('company')->loginUsingId($company->id, true);
        
        return redirect(route('company.data', ['id' => $company->id]));
        
    }

    public function data($id)
    {
        $company = Company::find($id);

        return view('company.pages.dados-empresa')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('company', $company);
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'name'          	=> 'required',
            'email'                  => [
                'required',
                Rule::unique('companies')->ignore($request->company_id)
            ],
            'password'      	=> 'required|min:6|confirmed',
            'phone'    			=> 'required',
            'description'   	=> 'required',
            'cnpj'          	=> 'required',
            'occupation_area'   => 'required',
            'cep'  				=> 'required',
        ]);

        $company                   	= Company::find($request->company_id);
        $company->name              = $request->name;
        $company->phone            	= $request->phone;
        $company->email   			= $request->email;
        $company->password      	= $request->password;
        $company->description       = $request->description;
        $company->cnpj           	= $request->cnpj;
        $company->occupation_area   = $request->occupation_area;
        $company->cep         		= $request->cep;
        $company->number 			= $request->number;

        // if (filter_var($request->linkedin, FILTER_VALIDATE_URL) === FALSE) {
        //     return redirect()->back()->with('success', 'Informar URL válida do Linkedin');
        // }
        // if (filter_var($request->facebook, FILTER_VALIDATE_URL) === FALSE) {
        //     return redirect()->back()->with('success', 'Informar URL válida do Facebook');
        // }
        // if (filter_var($request->twitter, FILTER_VALIDATE_URL) === FALSE) {
        //     return redirect()->back()->with('success', 'Informar URL válida do Twitter');
        // }
        // if (filter_var($request->blog, FILTER_VALIDATE_URL) === FALSE) {
        //     return redirect()->back()->with('success', 'Informar URL válida do Blog');
        // }
        $company->linkedin            = $request->linkedin;
        $company->facebook            = $request->facebook;
        $company->twitter             = $request->twitter;
        $company->blog                = $request->blog;

        $company->save();
        return redirect(route('company.opportunity', ['id' => $company->id]));
    }

    public function opportunity($id)
    {
        $company = Company::find($id);

        return view('company.pages.opportunity.opportunity')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('drivers', Driver::all())
        ->with('journeys', Journey::all())
        ->with('vehicles', Vehicle::all())
        ->with('specials', Special::all())
        ->with('languages', Language::all())
        ->with('knowledges', Knowledge::all())
        ->with('subknowledges', Subknowledge::all())
        ->with('hierarchies', Hierarchy::all())
        ->with('contract_types', ContractType::all())
        ->with('company', $company);
    }
}
