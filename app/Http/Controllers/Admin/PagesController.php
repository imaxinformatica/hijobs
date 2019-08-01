<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.pages.index')
        ->with('pages', $pages);
    }

    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.pages.pages.edit')
        ->with('page', $page);
    }

    public function update(Request $request)
    {
        $page = Page::find($request->id);
        $page->desc = ($request->desc);
        $page->save();

        return redirect()->back()->with('success', 'Alterado com Sucesso');
    }

    public function footer($urn)
    {
        $page = Page::where('urn', $urn)->first();
        return view('index.pages.pages')->with('page', $page);
    }
}
