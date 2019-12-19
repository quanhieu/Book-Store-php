<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\AddNewRequest;
use DB;

//http://localhost:81/new-lar/admin/new

class NewController extends Controller
{
    public function getNew()
    {
        // $data['newlist'] = News::all();
        $data['newlist'] = DB::select("SELECT * FROM news ORDER BY new_id ASC  ");
       
    	return view('backend.new', $data);
    }

    public function getAddNew()
    {
        $data['newlist'] = News::all();
    	return view('backend.addnew', $data);
    }
    public function postAddNew(AddNewRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
    	$new = new News;
        $new->title = $request->title;
        $new->content = $request->content;

        $new->new_image = $filename;

        
        $new->save();
        
        $request->img->storeAs('new', $filename);
        return back();
    }

    public function getEditNew($id)
    {
        $data['new'] = News::find($id);
    	return view('backend.editnew', $data);
    }
    public function postEditNew(Request $request, $id)
    {
    	$new = new News;
        $arr['new_id'] = $request->new_id;
        $arr['title'] = $request->title;
        $arr['content'] = $request->content;        
       
        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['new_image'] = $img;
            // $arr->image = $img;
            $request->img->storeAs('new', $img);
        }

        $new::where('new_id', $id)->update($arr);
        return redirect('admin/new');
    }

    public function getDeleteNew($id)
    {
    	News::destroy($id);
        return back();
    }

}
