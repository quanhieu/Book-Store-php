<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Mail;

class CartController extends Controller
{
    public function getAddCart($id)
    {
    	// https://github.com/Crinsane/LaravelShoppingcart
    	$product = Product::find($id);
    	Cart::add(['id' => '$id', 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_price, 'options' => ['img' => $product->prod_img]]);
    	return redirect('cart/show');

    	// $data = Cart::content();
    	// dd($data);
    }

    public function getShowCart()
    {
    	$data['total'] = Cart::total();
    	$data['items'] = Cart::content();
    	return view('frontend.cart',$data);
    }

    public function getDeleteCart($rowId)
    {
    	if($rowId=='all'){
    		Cart::destroy();
    	}else{
    		Cart::remove($rowId);
    	}

    	return back();
    }

    public function getUpdateCart(Request $request)
    {
    	Cart::update($request->rowId, $request->qty);
    }

    public function postComplete(Request $request)
    {
    	$data['info'] = $request->all();
    	$email = $request->email;
    	$data['cart'] = Cart::content();
    	$data['total'] = Cart::total();
    	Mail::send('frontend.email', $data, function ($message) use($email) {
    	    $message->from('hieutqgcs16216@fpt.edu.vn', 'Hieu Doe');  // mail khach
    	       	
    	    $message->to($email, $email); 
    	
    	    $message->cc('hieutqgcs16216@fpt.edu.vn', 'Quang Hieu'); // chu cua hang

    	    $message->subject('Xác nhận mua hàng');
    	    	    	
    	});
    	Cart::destroy();  // reset giỏ hàng
    	return redirect('complete');
    }

    public function getComplete()
    {
    	return view('frontend.complete');
    }
    // http://localhost:81/project-lar/complete
    // http://localhost:81/project-lar/admin/home
    // https://github.com/Crinsane/LaravelShoppingcart#configuration
}
