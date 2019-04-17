<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Company;
use App\Candidate;
use App\State;use App\Country;
use App\Driver;
use App\Journey;
use App\Vehicle;
use App\Special;
use App\Opportunity;
use App\Language;
use App\Knowledge;
use App\Hierarchy;
use App\Subknowledge;
use App\ContractType;
use App\OccupationArea;


class AdminController extends Controller
{
    public function pages()
    {
        $pages = Page::all();
        return view('admin.pages.pages.index')
        ->with('pages', $pages)
        ->with('pages', Page::all());
    }

    public function editPages($id)
    {
        $page = Page::find($id);
        return view('admin.pages.pages.edit')
        ->with('pages', $page)
        ->with('pages', Page::all());
    }

    public function updatePages(Request $request)
    {
        $page = Page::find($request->id);
        $page->desc = ($request->desc);
        $page->save();

        return redirect()->back()->with('success', 'Alterado com Sucesso')
        ->with('pages', Page::all());
    }

    public function footer($urn)
    {
        $page = Page::where('urn', $urn)->first();
        return view('index.pages.pages')->with('page', $page)
        ->with('pages', Page::all());
    }

    public function indexCompany()
    {
    	$companies = Company::all();
    	return view('admin.pages.company.index')
    	->with('companies', $companies)
        ->with('pages', Page::all());
    }

    public function editCompany($id)
    {
    	$company = Company::find($id);
    	return view('admin.pages.company.edit')
    	->with('states', State::all())
        ->with('countries', Country::all())
        ->with('occupations', OccupationArea::all())
    	->with('company', $company)
        ->with('pages', Page::all());
    }

    public function showCompany($id)
    {
    	$company = Company::find($id);
    	$company->publish = 1;
    	$company->save();
    	return redirect()->back()->with('success', 'Empresa Disponibilizada na Home')
        ->with('pages', Page::all());
    }

    public function removeCompany($id)
    {
    	$company = Company::find($id);
    	$company->publish = NULL;
    	$company->save();
    	return redirect()->back()->with('success', 'Empresa Removida da Home')
        ->with('pages', Page::all());    
    }


    public function indexCandidate()
    {
    	$candidates = Candidate::all();
    	return view('admin.pages.candidate.index')
    	->with('candidates', $candidates)
        ->with('pages', Page::all());
    }

    public function editCandidate($id)
    {
    	$candidate = Candidate::find($id);
    	return view('admin.pages.candidate.edit')
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
    	->with('candidate', $candidate)
        ->with('pages', Page::all());    
    }


    public function indexOpportunity()
    {
        $opportunities = Opportunity::all();
        return view('admin.pages.opportunity.index')
        ->with('opportunities', $opportunities)
        ->with('pages', Page::all());
    }

    public function editOpportunity($id)
    {
        $opportunity = Opportunity::find($id);
        return view('admin.pages.opportunity.edit')
        ->with('states', State::all())
        ->with('specials', Special::all())
        ->with('languages', Language::all())
        ->with('contract_types', ContractType::all())
        ->with('opportunity', $opportunity)
        ->with('pages', Page::all());   
    }

    public function showOpportunity($id)
    {
        $opportunity = Opportunity::find($id);
        $opportunity->publish = 2;
        $opportunity->save();
        return redirect()->back()->with('success', 'Empresa Disponibilizada na Home')
        ->with('pages', Page::all());
    }

    public function removeOpportunity($id)
    {
        $opportunity = Opportunity::find($id);
        $opportunity->publish = 1;
        $opportunity->save();
        return redirect()->bacshowk()->with('success', 'Vaga desabilitada')
        ->with('pages', Page::all());    
    }

    public function dashboard()
    {	
    	$opportunities = Opportunity::all();
    	return view('admin.pages.dashboard')
    	->with('candidates', Candidate::all())
    	->with('companies', Company::all())
    	->with('opportunities', $opportunities);
    }
}
