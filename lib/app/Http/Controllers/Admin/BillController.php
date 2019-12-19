<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\AddProductRequest;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use DB;


class BillController extends Controller
{
    public function getBill(Request $req)
    {
        if($req->key !=''){
       // ->latest()
       // ->first();
       // ->take(5)
                $key = $req->key;
                $data['keyword'] = $key;
                $result = str_replace(' ', '%', $key);

                // $product = Bill::where('payment','like','%'.$result.'%')
                // ->orWhere('id_customer', $result)
                // ->orWhere('bill_id', $result)
                // ->orWhere('date_order', $result)
                // ->orWhere('total', $result)
                // ->orWhere('note', 'like','%'.$result.'%')
                // ->get()->reverse();

                $product =  Bill::leftJoin('customer','bills.id_customer','=','customer.cus_id')
                ->where('cus_name','like','%'.$result.'%')
                ->orWhere('payment', $result)
                ->orWhere('id_customer', $result)
                ->orWhere('bill_id', $result)
                ->orWhere('date_order', $result)
                ->orWhere('total', $result)
                ->get();

                return view('backend.bill', [ 'bilist'=>$product,'key'=>$key]);
        }

        elseif($req->start !='' && $req->end !=''){
            $key ='';

           $dates = Bill::leftJoin('customer','bills.id_customer','=','customer.cus_id')
           ->whereBetween('date_order', array($req->start,$req->end))
           ->get();
           return view('backend.bill', [ 'bilist'=>$dates,'key'=>$key ]);
        }

        else{
            $key ='';
            $data = DB::table('bills')->join('customer','bills.id_customer','=','customer.cus_id')->orderBy('bill_id','desc')->get()->reverse();
            return view('backend.bill', [ 'bilist'=>$data,'key'=>$key]);
        }
        
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

    public function getEditBill($id)
    {
        $data['bill'] = Bill::find($id);
        $data['listcus'] = Customer::all();
    	return view('backend.editbill', $data);
    }
    public function postEditBill(Request $request, $id)
    {
    	$bill = new Bill;
        
        $arr['id_customer'] = $request->customer;
        $arr['date_order'] = $request->date_order;
        $arr['total'] = $request->total;
        $arr['payment'] = $request->payment;
        $arr['note'] = $request->note;
        
        $bill::where('bill_id', $id)->update($arr);
        return redirect('admin/bill');
    }

    public function getDeleteBill($id)
    {
        $parent = BillDetail::where('id_bill', $id)->count();
        if($parent ==0){
            Bill::destroy($id);
            return back();
        }else{
            echo "<script type='text/javascript'>
                alert('Sorry! You can not delete this item');
                window.location = '";
                echo asset('admin/bill');
            echo"';
             </script>";
        }
    	
    }

}
