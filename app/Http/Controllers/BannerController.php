<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{    
   
    public function index(){        
        $banner = Banner::orderBy('descricao')->get();
        return view('banner.index', compact('banner'));
    }

    public function create(Request $request){        
        return view('banner.create');
    }


    public function edit(Request $request, $id)    
    {         
                
        $banner = Banner::findOrFail($id);        
        return view('banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)    
    {   
        $request->validate([
            'descricao' => 'required',
            'banner_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        

        if($request->hasfile('banner_img'))
        {            
            $name = $request->descricao . '.' . $request->banner_img->getClientOriginalExtension();
            $path = 'public/uploads/banner';
            $request->banner_img->storeAs($path, $name);
            $banner_img = $name;            
            
        }else{
            $banner_img = null;
        }    
        $cat = Banner::findOrFail($id);
        $cat->descricao = $request->descricao;
        $cat->size = $banner_img;    

        $cat->update();

        return redirect('/banner')->with('success', 'Banner alterado com sucesso!');
    }

 
    public function store(Request $request){
        $request->validate([
            'descricao' => 'required',
            'banner_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
         #Handle File Upload
         if($request->hasfile('banner_img'))
        {
            $name = $request->descricao . '.' . $request->banner_img->getClientOriginalExtension();
            $path = 'public/uploads/banner';
            $request->banner_img->storeAs($path, $name);
            $banner_img = $name;
        }else{
            $banner_img = null;
        }
            
        $cat = new Banner();
        $cat->descricao = $request->descricao;
        $cat->size = $banner_img;
        $cat->save();
        return redirect('/banner')->with('success','Banner added Successfully !');
    }

    public function destroy($id)
    {        
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect('/banner')->with('success', 'Banner removido com sucesso!');
    }
    

}
