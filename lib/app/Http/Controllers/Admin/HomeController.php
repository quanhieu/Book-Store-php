<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Category;
use DB;
class HomeController extends Controller
{
    public function getHome()
    {
        $most= DB::select("SELECT  bill_detail.id_product,products.image, products.promotion_price, products.unit_price, products.id, products.name AS pname,
                SUM(quantity) AS TotalQuantity
                            FROM bill_detail
                            inner join products ON products.id = bill_detail.id_product 
                            GROUP BY bill_detail.id_product,products.name,products.image, products.promotion_price, products.unit_price, products.id
                            ORDER BY TotalQuantity ASC
                           ");
        $array[] = ['pname', 'TotalQuantity'];
        foreach($most as $key => $value)
        {
          $array[++$key] = [$value->pname, (int)$value->TotalQuantity];
        }
        $prod = Bill::all();
        $comt = Comment::all();
        $cus = Customer::all();
        $cate = BillDetail::all();
        return view('backend.index', ['all'=>$most, 'prod'=>$prod, 'comt'=>$comt, 'cus'=>$cus, 'cate'=>$cate])->with('mos', json_encode($array));
    	
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect()->intended('login');
    }

    //http://localhost:81/laravel/admin/category
}
