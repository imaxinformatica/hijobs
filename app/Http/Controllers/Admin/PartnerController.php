<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partner;
use Image;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.pages.partners.index')->with('partners', $partners);
    }
    public function create()
    {
        return view('admin.pages.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'link' => 'required|max:191',
        ]);
        $logo = $this->imgValidate($request);
        $partner = new Partner;
        
        $partner->name = $request->name;
        $partner->logo = $logo;
        $partner->link = $request->link;
        $partner->save();

        return redirect()->route('admin.partner')->with('success', 'Parceiro cadastrado com sucesso');

    }

    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('admin.pages.partners.edit')->with('partner', $partner);
    }
    public function update(Request $request)
    {   
        $partner = Partner::find($request->id);
        if($request->logo != "" || $request->logo != null){
            $logo = $this->imgValidate($request);
            $partner->logo = $logo;

        }
        $partner->name = $request->name;
        $partner->link = $request->link;
        $partner->save();
        

        return redirect()->back()->with('success', 'Parceiro editado com sucesso');
    }

    public function delete($id)
    {
        $partner = Partner::find($id);
        $partner->delete();
        return redirect()->back()->with('success', 'Parceiro deletado com sucesso');
    }

    private function imgValidate(Request $request)
    {
        if (isset($request->logo)) {
            $request->validate([
                'logo' => 'mimes:png,jpeg,jpg',
            ]);
            $originalPath = public_path().'/images/partner/';
            $arq_img = $request->file('logo');
            $name    = basename($arq_img->getClientOriginalName());
            $type    = strtolower(pathinfo($name,PATHINFO_EXTENSION));
            $count = 1;
            //Gera string aleatória
            while($count != 0){
                $str            = "";
                $characters     = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max            = count($characters) - 1;
                
                for ($i = 0; $i < 7; $i++) {
                    $rand   = mt_rand(0, $max);
                    $str   .= $characters[$rand];
                    $count  = Partner::where('logo', $str)->count();
                }
            }
            $arq_img_name = $str.'.'.$type;
            $image = Image::make($arq_img);
            $image->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save($originalPath.$arq_img_name); 
            
        }else{
            $arq_img_name = 'partner.png';    
        }
        return $arq_img_name;  
    }
}