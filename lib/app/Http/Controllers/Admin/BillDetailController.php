<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\AddProductRequest;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use DB;
use DateTime;


class BillDetailController extends Controller
{
    // Laravel multiple search in related tables
    // https://stackoverflow.com/questions/41737689/laravel-multiple-search-in-related-tables
    // https://laravel4all.wordpress.com/2013/07/10/joining-multiple-tables-and-building-a-search-page-using-eloquent-in-laravel-4/
    // https://alexpate.uk/journal/searching-multiple-tables-laravel/
    public function getBillDetail(Request $req)
    {
        if($req->key !=''){
            $key = $req->key;
            $data['keyword'] = $key;
            $result = str_replace(' ', '%', $key);

            // $product = BillDetail::where('id_bill','like','%'.$result.'%')
            // ->orWhere('id_product', $result)
            // ->orWhere('billde_id', $result)
            // ->orWhere('quantity', $result)
            // ->get();

            $product = BillDetail::leftJoin('products','bill_detail.id_product','=','products.id')
            ->where('name','like','%'.$result.'%')
            ->orWhere('id_bill', $result)
            ->orWhere('id_product', $result)
            ->orWhere('billde_id', $result)
            ->orWhere('quantity', $result)
            ->get();

            return view('backend.billdetail', [ 'bidelist'=>$product,'key'=>$key ]);
        }
        elseif($req->start !='' && $req->end !=''){
             $key = $req->start;  
             $data['keyword'] = $key;
             $result = str_replace(' ', '%', $key);

             $start_time = strtotime($req->start); 
             $end_time = strtotime($req->end);

             $dates = DB::select("SELECT bill_detail.*,products.name name
                from bill_detail
                inner join products ON products.id = bill_detail.id_product     
                WHERE UNIX_TIMESTAMP(bill_detail.created_at) >= $start_time AND  UNIX_TIMESTAMP(bill_detail.created_at) <= $end_time");
            return view('backend.billdetail', [ 'bidelist'=>$dates,'key'=>$key ]);    

        }
        else{
            $key ='';
            $data = DB::table('bill_detail')->join('products','bill_detail.id_product','=','products.id')->orderBy('billde_id','desc')->get();
            return view('backend.billdetail', [ 'bidelist'=>$data,'key'=>$key ]);
        }
    }

    public function getBillDetailDateRange(Request $req)
    {
        if($req->start !=''){
       $key = $req->start;  
       $data['keyword'] = $key;
       $result = str_replace(' ', '%', $key);

       $start_time = strtotime($req->start); 
       $end_time = strtotime($req->end);     
       // echo $end_time;
       // return;
       // $dates = BillDetail::where(DB::raw("UNIX_TIMESTAMP(created_at) >= $start_time AND UNIX_TIMESTAMP(created_at) <= $end_time"))
       // ->get();

       $dates = DB::select("SELECT bill_detail.*,products.name name
        from bill_detail
        inner join products ON products.id = bill_detail.id_product     
        WHERE UNIX_TIMESTAMP(bill_detail.created_at) >= $start_time AND  UNIX_TIMESTAMP(bill_detail.created_at) <= $end_time");
// đoi ten bang product -> created_at -> create_at
       
       // $dates = DB::select("SELECT * 
       //  from bill_detail
       //  WHERE UNIX_TIMESTAMP(created_at) >= $start_time AND  UNIX_TIMESTAMP(created_at) <= $end_time");

       return view('backend.billdetaildate', [ 'bidelist'=>$dates,'key'=>$key ]);
     }else{
            $key ='';
            $data = DB::table('bill_detail')->join('products','bill_detail.id_product','=','products.id')->orderBy('billde_id','desc')->get();
            return view('backend.billdetaildate', [ 'bidelist'=>$data,'key'=>$key ]);
        }

    }

    public function getChart()
    {
        $most= DB::select("SELECT  bill_detail.id_product,products.image, products.promotion_price, products.unit_price, products.id, products.name AS pname,
                SUM(quantity) AS TotalQuantity
                            FROM bill_detail
                            inner join products ON products.id = bill_detail.id_product 
                            GROUP BY bill_detail.id_product,products.name,products.image, products.promotion_price, products.unit_price, products.id
                            ORDER BY TotalQuantity DESC
                           ");
        $array[] = ['pname', 'TotalQuantity'];
        foreach($most as $key => $value)
        {
          $array[++$key] = [$value->pname, (int)$value->TotalQuantity];
        }
        return view('backend.chart', ['all'=>$most])->with('mos', json_encode($array));
    }

    // public function getAddBill()
    // {
    //     $data['bilist'] = Bill::all();
    // 	return view('backend.addbill', $data);
    // }
    // public function postAddBill(Request $request)
    // {
       
    // 	$bill = new Bill;

    //     $bill->id_customer = $request->customer;
    //     $bill->date_order = $request->date_order;
    //     $bill->total = $request->total;
    //     $bill->payment = $request->payment;
    //     $bill->note = $request->note;
        

    //     $bill->save();
        
    //     return back();
    // }

    public function getEditBillDetail($id)
    {
        $data['billde'] = BillDetail::find($id);
        $data['listpro'] = Product::all();
    	return view('backend.editbilldetail', $data);
    }
    public function postEditBillDetail(Request $request, $id)
    {
    	$billdetail = new Bill;
        $arr['id_bill'] = $request->id_bill;
        $arr['id_product'] = $request->product;
        
        $arr['quantity'] = $request->quantity;
        $arr['unit_price'] = $request->unit_price;
      
        
        $billdetail::where('billde_id', $id)->update($arr);
        return redirect('admin/editbilldetail');
    }

    public function getDeleteBillDetail($id)
    {
    	BillDetail::destroy($id);
        return back();
    }

}
