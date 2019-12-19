<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Http\Requests\AddSlideRequest;


class SlideController extends Controller
{
    public function getSlide()
    {
    	$data['slidelist'] = Slide::all();
    	return view('backend.slide', $data);
    }

    public function postSlide(AddSlideRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
    	$slide = new Slide;

        $slide->image = $filename;

    	$slide->save();
        $request->img->storeAs('slide', $filename);
      
    	return back();
    }

    public function getEditSlide($id)
    {
    	$data['slide'] = Slide::find($id);
    	return view('backend.editslide', $data);
    }

    public function postEditSlide(Request $request, $id)
    {
        $slide = new Slide;
       
        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['image'] = $img;

            $request->img->storeAs('slide', $img);
        }

        $slide::where('id', $id)->update($arr);
        return redirect('admin/slide');
    }

    public function getDeleteSlide($id)
    {
    	Slide::destroy($id);
    	return back();
    }
}
