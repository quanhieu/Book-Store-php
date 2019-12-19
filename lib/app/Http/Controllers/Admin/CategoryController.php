<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use DB;

class CategoryController extends Controller
{
    public function getCate(Request $req)
    {
    	if($req->key !=''){
            $key = $req->key;
            $data['keyword'] = $key;
            $result = str_replace(' ', '%', $key);
            $product = Category::where('cate_name','like','%'.$result.'%')
                ->orWhere('cate_slug', $result)
                ->orWhere('description', 'like','%'.$result.'%')
                ->get();
                return view('backend.searchcategory', [ 'catelist'=>$product,'key'=>$key ]);
        }else{
            $key ='';
            $data = Category::all();
            return view('backend.searchcategory', [ 'catelist'=>$data,'key'=>$key ]);
        }
    }

    public function getSearch(Request $req)
    {
        if($req->key !=''){
            $key = $req->key;
            $data['keyword'] = $key;
            $result = str_replace(' ', '%', $key);
            $product = Category::where('cate_name','like','%'.$result.'%')
                ->orWhere('cate_slug', $result)
                ->orWhere('description', 'like','%'.$result.'%')
                ->get();
                return view('backend.searchcategory', [ 'catelist'=>$product,'key'=>$key ]);
        }else{
            $key ='';
            $data = Category::all();
            return view('backend.searchcategory', [ 'catelist'=>$data,'key'=>$key ]);
        }
        
        
    }

    public function postCate(AddCateRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
    	$category = new Category;
    	$category->cate_name = $request->name;
    	$category->cate_slug = str_slug($request->name);
        $category->description = $request->description;

        $category->cate_image = $filename;

    	$category->save();
        $request->img->storeAs('product', $filename);
      
    	return back();
    }

    public function getEditCate($id)
    {
    	$data['cate'] = Category::find($id);
    	return view('backend.editcategory', $data);
    }
    
    // public function postEditCate(EditCateRequest $request, $id)
    // {
    // 	$category = Category::find($id);
    // 	$category->cate_name = $request->name;
    //     $category->cate_slug = str_slug($request->name);
    //     $category->description = $request->description;
    //     // $category->cate_image = $request->cate_image;

    //     if($request->hasFile('img')){
    //         $img = $request->img->getClientOriginalName();
    //         $arr['cate_image'] = $img;
    //         $request->img->storeAs('product', $img);
    //     }

    // 	// $category->save();
    // 	// return redirect()->intended('admin/category');
    //     return redirect('admin/category');
    // }

    public function postEditCate(EditCateRequest $request, $id)
    {
        $category = new Category;
        $arr['cate_name'] = $request->name;
        $arr['cate_slug'] = str_slug($request->name);
        $arr['description'] = $request->description;
       
        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['cate_image'] = $img;
            // $arr->image = $img;
            $request->img->storeAs('product', $img);
        }

        $category::where('cate_id', $id)->update($arr);
        return redirect('admin/category');
    }

    public function getDeleteCate($id)
    {
        $parent = Product::where('id_type', $id)->count();
        if($parent ==0){
            Category::destroy($id);
            return back();
        }else{
            echo "<script type='text/javascript'>
                alert('Sorry! You can not delete this item');
                window.location = '";
                echo asset('admin/category');
            echo"';
             </script>";
        }
    	
    }


    

    // public function postSearch(Request $req)
    // {
    //     if($req->ajax()){
    //         $output = '';
    //         $query = $req->get('query');
    //         if($query !=''){
    //             $data = DB::table('type_products')
    //                 ->where('cate_name', 'like', '%'.$query.'%')
    //                 ->orWhere('cate_slug', 'like', '%'.$query.'%')
    //                 ->orWhere('description', 'like', '%'.$query.'%')
    //                 ->orderBy('cate_id', 'desc')
    //                 ->get();
    //         }else{
    //             $data= DB::table('type_products')
    //                 ->orderBy('cate_id', 'desc')
    //                 ->get();
    //         }
    //         $total_row - $data->count();
    //         if($total_row > 0){
    //             foreach($data as $row){
    //                 $output .=' 
    //                     <tr>
    //                     <td>{{$cate->cate_name}}</td>
    //                     <td>{{$cate->description}}</td>

    //                     <td>
    //                     <img height="150px" src="public/source/image/product/'.$cate->cate_image.'" class="thumbnail">
    //                     </td>
    //                     <td>
    //                     <a href="admin/category/edit/'.$cate->cate_id.'" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
    //                     <a href="admin/category/delete/'.$cate->cate_id.'" onclick="return confirm("Are you sure to delete?")" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
    //                     </td>
    //                     </tr>
    //                 ';
    //             }
    //         } else{
    //             $output = '
    //                 <tr>
    //                 <td align="center" colspan="5">No Data Found</td>
    //                 </tr>
    //             ';
    //         }
    //         $data = array(
    //             'table_data' => $output,
    //             'total_data' => $total_row
    //         );
    //         $son = echo json_encode($data);
    //         return response()->$son;
    //     }
    // }
}
