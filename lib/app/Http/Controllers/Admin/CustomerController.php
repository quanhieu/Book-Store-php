<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Bill;


class CustomerController extends Controller
{
    public function getCustomer(Request $req)
    {
        if($req->key !=''){
            $key = $req->key;
            $data['keyword'] = $key;
            $result = str_replace(' ', '%', $key);
             $product = Customer::where('cus_name','like','%'.$result.'%')
             ->orWhere('gender', $result)
             ->orWhere('email', $result)
             ->orWhere('address', 'like','%'.$result.'%')
             ->orWhere('phone_number', $result)
              ->orWhere('note', 'like','%'.$result.'%')
             ->get();
             return view('backend.customer', [ 'cuslist'=>$product,'key'=>$key ]);
        }else{
            $key ='';
            $data = Customer::all();
            return view('backend.customer',  ['cuslist'=>$data,'key'=>$key ]);
        }
    	
    }

    public function getAddCustomer()
    {
        $data['cuslist'] = Customer::all();
        return view('backend.addcustomer', $data);
    }

    public function postAddCustomer(Request $request)
    {
        $customer = new Customer;
    	$customer->cus_name = $request->cus_name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        // $customer->password = $request->password;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->note = $request->note;

    	$customer->save();
    	return back();
    }

    public function getEditCustomer($id)
    {
    	$data['cus'] = Customer::find($id);
    	return view('backend.editcustomer', $data);
    }


    public function postEditCustomer(Request $request, $id)
    {
        $customer = new Customer;
        $arr['cus_name'] = $request->cus_name;
        $arr['gender'] = $request->gender;
        $arr['email'] = $request->email;
        $arr['address'] = $request->address;
        $arr['phone_number'] = $request->phone_number;
        $arr['note'] = $request->note;

        $customer::where('cus_id', $id)->update($arr);
        return redirect('admin/customer');
    }

    public function getDeleteCustomer($id)
    {
        $parent = Bill::where('id_customer', $id)->count();
        if($parent ==0){
            Customer::destroy($id);
            return back();
        }else{
            echo "<script type='text/javascript'>
                alert('Sorry! You can not delete this item');
                window.location = '";
                echo asset('admin/customer');
            echo"';
             </script>";
        }
    	
    }
}
