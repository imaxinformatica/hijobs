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
use App\OccupationArea;
use App\Opportunity;
use Auth;

class CompanyController extends Controller
{
    public function session(Request $request)
    {
        $request->session()->put('email', $request->email);

        return redirect(route('company.create'));
    }
    public function create(Request $request)
    {
        // return dd($request->session()); 
        return view('company.pages.create')->with('email', $request->session()->pull('email'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required|max:50|unique:companies',
            'password'          => 'required|min:6|confirmed',
        ]);
        $company = new Company;
        $company->name 		  = $request->name;
        $company->email       = $request->email;
        $company->password    = bcrypt($request->password);

        $company->save();

        Auth::guard('company')->loginUsingId($company->id, true);
        
        return redirect(route('company.data'));
        
    }

    public function data()
    {
        $company = Auth::guard('company')->user();

        return view('company.pages.dados-empresa')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('occupations', OccupationArea::all())
        ->with('company', $company);
    }

    public function show()
    {
        $company = Auth::guard('company')->user();
        return view('company.pages.show-empresa')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('occupations', OccupationArea::all())
        ->with('company', $company);
    }

    public function edit()
    {
        $company = Auth::guard('company')->user();
        return view('company.pages.edit-empresa')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('occupations', OccupationArea::all())
        ->with('company', $company);
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'password'          => 'required|min:6|confirmed',
        ]);

        $company = Auth::guard('company')->user();

        $company->password = bcrypt($request->password);
        $company->save();
        return redirect()->back()->with('success', 'Senha alterada!');
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'trade'                 => 'required',
            'phone'    			    => 'required',
            'description'   	    => 'required|max:500',
            'cnpj'          	    => 'required',
            'occupation_area_id'    => 'required',
            'cep'  				    => 'required',
        ]);

        $company                   	   = Company::find($request->company_id);
        $company->trade                = $request->trade;
        $company->phone            	   = $request->phone;
        $company->description          = $request->description;
        $company->cnpj           	   = $request->cnpj;
        $company->occupation_area_id   = $request->occupation_area_id;
        $company->cep         		   = $request->cep;
        $company->street               = $request->street;
        $company->neighborhood 		   = $request->neighborhood;
        $company->city                 = $request->city;
        $company->state                = $request->state;
        $company->number               = $request->number;
        if ($request->name != null ||  $request->name != '') {
            $company->name             = $request->name;
        }
        if ($request->email != null || $request->email != '') {
            $company->email            = $request->email;
        }

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

        return redirect(route('opportunity.index'))->with('Empresa Salva com sucesso!');
    }

    public function candidate()
    {

    }

}
