<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Hash;

class AdminController extends Controller
{
    public function getAdmin()
    {
        $data = Admin::all();
        return view('backend.admin',  ['admin'=>$data]);
    	
    }

    public function postAdmin(Request $request)
    {
        $this->validate($request,
            [               //bắt buộc nhập| đúng định dạng email| kiếm tra trùng email| 
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'full_name'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Please enter your email',
                'email.email'=>'Incorrect email format',
                'email.unique'=>'Email has been used, please use other email',
                'password.required'=>'Please enter password',
                're_password.same'=>'Passwords are not identical',
                'password.min'=>'Password at least 6 characters',
            ]);
        $admin = new Admin;
    	$admin->full_name = $request->full_name;
        $admin->email = $request->email;
        // $admin->password = $request->password;
        $admin->password = Hash::make($request->password);
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        // $admin->note = $request->note;

    	$admin->save();
    	// return back();
        return redirect()->back()->with('thanhcong', 'Create admin account success');
    }

    public function getEditAdmin($id)
    {
    	$data['ad'] = Admin::find($id);
    	return view('backend.editadmin', $data);
    }


    public function postEditAdmin(Request $request, $id)
    {
        $admin = new Admin;
        $arr['full_name'] = $request->full_name;
        // $arr['password'] = $request->password;
        $arr['password'] = Hash::make($request->password);
        $arr['email'] = $request->email;
        $arr['address'] = $request->address;
        $arr['phone'] = $request->phone;
        // $arr['note'] = $request->note;

        $admin::where('id', $id)->update($arr);
        return redirect('admin/admin');
    }

    public function getDeleteAdmin($id)
    {
    	Admin::destroy($id);
    	// return back();
        return back()->with('deletethanhcong', 'Delete admin account success');
    }
}
