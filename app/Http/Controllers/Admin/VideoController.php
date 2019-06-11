<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Video};

class VideoController extends Controller
{
    public function index()
    {
    	return view('admin.pages.videos.index')
    	->with('videos', Video::all());
    }

    public function create()
    {
    	return view('admin.pages.videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required',
            'name' => 'required'
        ]);
    	$video = new Video;
    	$video->name = $request->name;
    	$video->video = $this->videoGenerate($request);
    	$video->save();

    	return redirect(route('admin.video'))->with('success', 'Video Incluido com sucesso');
    }

    public function edit($id)
    {
    	$video =Video::find($id);
    	return view('admin.pages.videos.edit')->with('video', $video);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
    	$video = Video::find($request->id);
    	$video->name = $request->name;
    	if ($request->video != NULL) {
    		$video->video = $this->videoGenerate($request);
    	}
    	$video->save();

    	return redirect(route('admin.video'))->with('success', 'Video Alterado com sucesso');
    }

    public function delete($id)
    {
    	$video = Video::find($id); 
    	$video->delete();
    	return redirect(route('admin.video'))->with('success', 'Video Removido com sucesso');
    }

    private function videoGenerate(Request $request)
    {
        $arq_img = $request->file('video');
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
                $count  = Video::where('video', $str)->count();
            }
        }
        $arq_img_name = $str.'.'.$type;
        $arq_img->move('images/video', $arq_img_name); 

        return $arq_img_name;  
    }
}
