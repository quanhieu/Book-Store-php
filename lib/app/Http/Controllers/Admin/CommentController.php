<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use DB;

class CommentController extends Controller
{
    public function getComment()
    {
        $prod['prolist'] = Product::all();
    	$data['comlist'] = DB::table('comment')->join('products','comment.id_product','=','products.id')->orderBy('com_id','desc')->get();
    	return view('backend.comment', $data, $prod);
    }


    public function postComment(Request $request)
    {
        $comment = new Comment;
    	$comment->content = $request->content;
        $comment->name_customer = $request->name_customer;
        $comment->id_product = $request->product;

    	$comment->save();
    	return back();
    }

    public function getEditComment($id)
    {
        $prod['prolist'] = Product::all();
    	$data['comt'] = Comment::find($id);
    	return view('backend.editcomment', $data, $prod);
    }


    public function postEditComment(Request $request, $id)
    {
        $comment = new Comment;
        $arr['content'] = $request->content;
        $arr['name_customer'] = $request->name_customer;
        $arr['id_product'] = $request->product;
        
        $comment::where('com_id', $id)->update($arr);
        return redirect('admin/comment');
    }

    public function getDeleteComment($id)
    {
    	Comment::destroy($id);
    	return back();
    }
}
