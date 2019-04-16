<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class AdminController extends Controller
{
    public function indexCompany()
    {
    	$companies = Company::all();
    	return view('admin.pages.company.index')
    	->with('companies', $companies);
    }

    public function editCompany($id)
    {
    	$companies = Company::all();
    	return view('admin.pages.company.index')
    	->with('companies', $companies);
    }

    public function showCompany($id)
    {
    	$company = Company::find($id);
    	$company->publish = 1;
    	$company->save();
    	return redirect()->back()->with('success', 'Empresa Disponibilizada na Home');
    }

    public function removeCompany($id)
    {
    	$company = Company::find($id);
    	$company->publish = NULL;
    	$company->save();
    	return redirect()->back()->with('success', 'Empresa Disponibilizada na Home');
    }

    public function indexCandidate()
    {

    }

    public function reports()
    {

    }

    public function dashboard()
    {

    }
}
