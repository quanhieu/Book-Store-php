<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\BillDetail;
use DB;

class ProductController extends Controller
{
    public function getProduct(Request $req)
    {

        if($req->key !=''){
            $catelist = Category::all();

            $key = $req->key;
            $data['keyword'] = $key;
            $result = str_replace(' ', '%', $key);

            $product = Product::where('name','like','%'.$result.'%')
                ->orWhere('prod_slug', $result)
                ->orWhere('unit_price', $result)
                ->orWhere('promotion_price', $result)
                ->orWhere('unit', $result)
                ->orWhere('new', $result)
                ->orWhere('id_type', $result)
                ->orWhere('description', 'like','%'.$result.'%')
                // ->latest()
                // ->first();
                // ->take(5)
                ->get();
                return view('backend.product', [ 'productlist'=>$product,'key'=>$key, 'catelist'=>$catelist ]);
        }else{
            $key ='';
            $data = DB::table('products')->join('type_products','products.id_type','=','type_products.cate_id')->orderBy('id','desc')->get()->reverse();
            return view('backend.product', [ 'productlist'=>$data,'key'=>$key ]);
        }

     //    $data['productlist'] = DB::table('products')->join('type_products','products.id_type','=','type_products.cate_id')->orderBy('id','desc')->get(); 
    	// return view('backend.product', $data);
    }

    public function getAddProduct()
    {
        $data['catelist'] = Category::all();
    	return view('backend.addproduct', $data);
    }
    public function postAddProduct(Request $request)
    {
        $filename = $request->img->getClientOriginalName();
    	$product = new Product;
        $product->name = $request->name;
        $product->prod_slug = str_slug($request->name);
        $product->id_type = $request->cate;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->image = $filename;

        
        $product->save();
        // $request->img->storeAs('avatar', $filename);
        $request->img->storeAs('product', $filename);
        return back();
    }

    public function getEditProduct($id)
    {
        $data['product'] = Product::find($id);
        $data['listcate'] = Category::all();
    	return view('backend.editproduct', $data);
    }
    public function postEditProduct(Request $request, $id)
    {
    	$product = new product;
        $arr['name'] = $request->name;
        $arr['prod_slug'] = str_slug($request->name);
        $arr['id_type'] = $request->cate;
        $arr['description'] = $request->description;
        $arr['unit_price'] = $request->unit_price;
        $arr['promotion_price'] = $request->promotion_price;
        $arr['unit'] = $request->unit;
        $arr['new'] = $request->new;
        
       
        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['image'] = $img;
            // $arr->image = $img;
            $request->img->storeAs('product', $img);
        }

        $product::where('id', $id)->update($arr);
        return redirect('admin/product');
    }

    public function getDeleteProduct($id)
    {
        $parent = BillDetail::where('id_product', $id)->count();
        if($parent ==0){
            Product::destroy($id);
            return back();
        }else{
            echo "<script type='text/javascript'>
                alert('Sorry! You can not delete this item');
                window.location = '";
                echo asset('admin/product');
            echo"';
             </script>";
        }
    	
    }

}
