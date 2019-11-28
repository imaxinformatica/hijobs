<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Limit;
use Auth;

class ConfigurationController extends Controller
{
    public function edit()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.pages.configuration.edit')
            ->with('limit', Limit::first())
            ->with('user', $user);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
        ]);

        $user = Auth::guard('admin')->user();
        $user->update($request->except('_token'));
        return redirect()->back()->with('success','Dados atualizados com sucesso' );
    }

    public function limit(Request $request)
    {
        $request->validate([
            'qty' => 'required|int'
        ]);

        Limit::first()->update($request->except('token'));
        return redirect()->back()->with('success','Dados atualizados com sucesso' );

    }
}
