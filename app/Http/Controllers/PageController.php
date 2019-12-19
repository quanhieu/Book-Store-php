<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\Comment;
use App\News;
use App\User;           //
use App\Cus;
use Hash;
use Auth;
use DB;
use Mail;

class PageController extends Controller
{
    public function getIndex()
    {
    	$slide = Slide::all();
    	// phan trang paginate
    	$new_product = Product::where('new',1)->paginate(4);

    	$khuyenmai = Product::where('promotion_price', '<>',0)->paginate(8);
    	 //dd($new_product);
    	return view('page.trangchu', ['slide'=>$slide, 'new_product'=>$new_product, 'promotion_price'=>$khuyenmai]);
    	// return view('page.trangchu', compact('slide');
    }

    public function getLoaiSp($type)
    {
    	$sp_theoloai = Product::where('id_type', $type)->get();
    	$sp_khac = Product::where('id_type', '<>',$type)->paginate(3);
    	$loai = ProductType::all();
    	$loai_sp = ProductType::where('cate_id', $type)->first();
    	return view('page.loai_sanpham', ['category'=>$sp_theoloai, 'otherProduct'=>$sp_khac, 'listcategory'=>$loai, 'categoryname'=>$loai_sp]);
    	// return view('page.loai_sanpham');
    }

    public function getAll()
    {

        $loai = ProductType::all();
           $all = Product::all();
           return view('page.loai_all', ['all'=>$all, 'listcategory'=>$loai]);
  
    }

    public function getUp()
    {
        $loai = ProductType::all();
        $tangx= DB::select("SELECT * FROM products ORDER BY unit_price DESC  "); // giảm dần
        return view('page.loai_all', ['all'=>$tangx, 'listcategory'=>$loai]);
    }
    public function getLow()
    {
       $loai = ProductType::all();
        $giamx= DB::select("SELECT * FROM products ORDER BY unit_price ASC  "); // tăng dần dần
        return view('page.loai_all', ['all'=>$giamx, 'listcategory'=>$loai]); 
    }
    public function getAbc()
    {
         $loai = ProductType::all();
        // https://laracasts.com/discuss/channels/laravel/need-to-sort-prodcut-by-price-asc-and-desc
        $abcx= DB::select("SELECT * FROM products ORDER BY name ASC  ");
        return view('page.loai_all', ['all'=>$abcx, 'listcategory'=>$loai]);
    }
    public function getZyx()
    {
        $loai = ProductType::all();
        $zxyx= DB::select("SELECT * FROM products ORDER BY name DESC  ");
        return view('page.loai_all', ['all'=>$zxyx, 'listcategory'=>$loai]);
    }
    public function getLatest()
    {
        $loai = ProductType::all();
        $latest= DB::select("SELECT * FROM products ORDER BY id DESC  ");
        return view('page.loai_all', ['all'=>$latest, 'listcategory'=>$loai]);
    }
    public function getPopular()
    {
        $loai = ProductType::all();
        $most= DB::select("SELECT  bill_detail.id_product,products.name,products.image, products.promotion_price, products.unit_price, products.id, 
                SUM(quantity) AS TotalQuantity
                            FROM bill_detail
                            inner join products ON products.id = bill_detail.id_product 
                            GROUP BY bill_detail.id_product,products.name,products.image, products.promotion_price, products.unit_price, products.id
                            ORDER BY TotalQuantity DESC
                           ");
        return view('page.loai_all', ['all'=>$most, 'listcategory'=>$loai]);
    }

    public function getChitiet(Request $req, $id)
    {
    	$product = Product::where('id', $req->id)->first();
    	$sp_tuongtu = Product::where('id_type', $product->id_type)->paginate(6);
        
        // $customer = Comment::where('com_id', $comment->com_id)->get();
        $data_comt = Comment::where('id_product', $id)->get();
        $id_pro = $id;
        // $comment = Comment::all();
        $dem = count($data_comt);

        $new = Product::all();
        $latest = $new->reverse()->take(4);
//sort
        

        $most= DB::select("SELECT  bill_detail.id_product,products.name,products.image, products.promotion_price, products.unit_price, SUM(quantity) AS TotalQuantity
                            FROM bill_detail
                            inner join products ON products.id = bill_detail.id_product 
                            GROUP BY bill_detail.id_product,products.name,products.image, products.promotion_price, products.unit_price
                            -- ORDER BY SUM(quantity) DESC
                            ORDER BY TotalQuantity DESC
                            LIMIT 5
                           "); // take 5 most popular product

        // dd($most);
//end sort
        // $data = DB::table('comment')->join('customer','comment.id_customer','=','customer.cus_id')->orderBy('com_id','desc')->get();
        return view('page.chitiet_sanpham', ['product'=>$product, 'psame'=>$sp_tuongtu, 'idpro'=>$id_pro, 
                                                                'dem'=>$dem, 'comt'=>$data_comt, 'latest'=>$latest, 'most'=>$most]);
    }

    public function postComment(Request $req, $id)
    {
        $comment = new Comment;
        $comment->content = $req->content;
        $comment->name_customer = $req->name_customer;
        
        // $comment->id_customer = Auth::guard('cus')->id();
        $comment->id_product = $id;

        $comment->save();
        return redirect()->back()->with('thanhcong', 'Comment successful');
    }

    public function getLienhe()
    {
    	return view('page.lienhe');
    }

    public function getGioithieu()
    {
        // $news = News::all();
         $news = DB::select("SELECT * FROM news ORDER BY new_id ASC  ");
        $com = Comment::all();
        $user = Customer::all();
        $pro = Product::all();
    	return view('page.gioithieu', ['news'=>$news, 'com'=>$com, 'user'=>$user, 'pro'=>$pro]);
    }

    public function getAddtoCart(Request $req ,$id)
    {
    	
    	$product = Product::find($id);
    	$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $id);
    	$req->session()->put('cart', $cart);
    	return redirect()->back();
    }

    public function getDelItemCart($id)
    {
    	$oldCart = Session::has('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->removeItem($id);
    	
    	if(count($cart->items)>0){
    		Session::put('cart', $cart);
    	}else{
    		Session::forget('cart');
    	}
    	return redirect()->back();
    }

    public function getCheckout()
    {
    	return view('page.dat_hang');
    }

    public function postCheckout(Request $req)
    {
    	$cart = Session::get('cart');

// dd($cart);
    	// $customer = new Customer;
    	// $customer->cus_name = $req->name;
    	// $customer->gender = $req->gender;
    	// $customer->email = $req->email;
    	// $customer->address = $req->address;
    	// $customer->phone_number = $req->phone;
    	// $customer->note = $req->note;
    	// $customer->save();

        $customer = new Customer;
        $arr['cus_name'] = $req->name;
        $arr['gender'] = $req->gender;
        $arr['email'] = $req->email;
        $arr['address'] = $req->address;
        $arr['phone_number'] = $req->phone;
        $arr['note'] = $req->note;
        $id = Auth::guard('cus')->id();
        $customer::where('cus_id', $id)->update($arr);

    	$bill = new Bill;
    	$bill->id_customer = $req->id;
    	$bill->date_order = date('Y-m-d');
    	$bill->total = $cart->totalPrice ;
    	$bill->payment = $req->payment_method ;
    	$bill->note = $req->note ;
    	$bill->save();

    	foreach ($cart->items as $key => $value) {
    		$bill_detail = new BillDetail;
    		$bill_detail->id_bill = $bill->id;
    		$bill_detail->id_product = $key;
    		$bill_detail->quantity = $value['qty'];
    		$bill_detail->unit_price = ($value['price']/$value['qty']);
    		$bill_detail->save();
    	}
    	Session::forget('cart');
    	return redirect()->back()->with('thongbao', "Order Success");

    }

    public function getLogin()
    {
        // $id['cus_id'] = Auth::guard('cus')->id();
        // $cus = Session::get('cus');
        // $productx = Customer::where('cus_id', $cus)->get();
        //
        // foreach ($cus as $key => $value) {
        //     $cu = new User;
        //     $cu->id = $value['id'];
        //     $cu->full_name = $value['full_name'];
        //     $cu->email = $value['email'];
        //     $cu->phone = $value['phone'];
        //     $cu->address = $value['address'];
        //     $cu->remember_token = $value['remember_token'];
        //     // $c = $cu->full_name;
        // }
        // dd($id);
        //
        // return view('page.dangnhap', ['cus'=>$productx]);
    	return view('page.dangnhap');
    }

    public function postLogin(Request $req)
    {
    	$this->validate($req,
    		[
    			'email'=>'required|email',
    			'password'=>'required|min:6|max:20'
    		],
    		[
    			'email.required'=>'Please enter your email',
    			'email.email'=>'Incorrect email format',
    			'password.required'=>'Please enter password',
    			'password.min'=>'Password at least 6 characters',
    			'password.max'=>'Password not more than 20 characters'

    		]
    	);
    	$credentials = array('email'=>$req->email, 'password'=>$req->password);
    	if(Auth::guard('cus')->attempt($credentials)){
            //
            // $cus = array('cus'=>Auth::guard('cus')->user());
            // $cus = array('cus'=>Auth::id());

            // $cus = array('cus'=>Auth::guard('cus')->id());
            // $req->session()->put('cus', $cus);
            // dd($cus);

            // return redirect()->back()->with(['flag'=>'success','message'=>'Logged in successfully']);
            return redirect()->route('trang-chu');
    		
    	}else{
    		return redirect()->back()->with(['flag'=>'danger','message'=>'Login unsuccessful']);
    	}
    }

    public function getSignin()
    {
    	return view('page.dangki');
    }

     public function postSignin(Request $req)
    {
    	$this->validate($req,
    		[				//bắt buộc nhập| đúng định dạng email| kiếm tra trùng email| 
    			'email'=>'required|email|unique:customer,email',
    			'password'=>'required|min:6|max:20',
    			'fullname'=>'required',
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
    	$user = new Cus();
    	$user->cus_name = $req->fullname;
    	$user->email = $req->email;
    	$user->password = Hash::make($req->password);
		$user->phone_number = $req->phone;
		$user->address = $req->address;
		$user->save();
		return redirect()->back()->with('thanhcong', 'Created account successfully ');
    }

    public function getLogout()
    {
        //
        // Session::forget('cus');
        //Auth::logout();
    	Auth::guard('cus')->logout();
    	return redirect()->route('trang-chu');
    }



    public function getSearch(Request $req)
    {
        $key = $req->key;
        $data['keyword'] = $key;
        $result = str_replace(' ', '%', $key);

        $product = Product::where('name','like','%'.$result.'%')
                                 ->orWhere('unit_price', $result)
    	                         ->orWhere('promotion_price', $result)
                                 ->orWhere('prod_slug', $result)
    	                         ->get();
    	return view('page.search', ['product'=>$product, 'key'=>$key]);
    }

    public function postMail(Request $req)
    {
        
        $data['info'] = $req->all();
        $data['name'] = $req->name;
        $email = $req->email;
        $data['phone'] = $req->phone;
        $data['message'] = $req->message;
      
        Mail::send('page.email', $data, function ($message) use($email) {
            $message->from('hieutqgcs16216@fpt.edu.vn', 'Hieu Doe');  // mail khach
                
            $message->to($email, $email); 
        
            $message->cc('hieutqgcs16216@fpt.edu.vn', 'Quang Hieu'); // chu cua hang

            $message->subject('Confirm mail has delivery successful');
                        
        });

        return redirect()->back()->with('thongbao', "Send mail success");
    }

    //http://localhost:81/new-lar/public/index
}
