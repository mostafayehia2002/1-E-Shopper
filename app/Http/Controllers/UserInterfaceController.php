<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class UserInterfaceController extends Controller
{

    public function index(){
        $products=Product::all();
        return view('index',compact('products'));
    }
    public function addToCart(Request $r){
         $id=$r->id;
       $product=Product::find($id);
      $cart=session()->get('cart');
      if(isset($cart[$id])){
          $cart[$id]['quantity']++;
      }else{
          $cart[$id]=[
              'product_id'=>$product->id,
              'product_name'=>$product->product_name,
              'product_price'=>$product->product_price,
              'product_photo'=>$product->product_photo,
              'quantity'=>1,
          ];
      }
        session()->put('cart',$cart);

    }
public function updateCart(Request $r){
   if($r->id && $r->quantity){
    $cart=session()->get('cart');
     $cart[$r->id]['quantity']=$r->quantity;
     session()->put('cart',$cart);
}

}
public function  removeCart($id){
    $cart=session()->get('cart');
       unset($cart[$id]);
      session()->put('cart',$cart);
        return redirect()->back();
}

    public function showCart(){

        return view('cart');
    }

public function successBuying(Request $r){
    if(!Auth::guard('web')->check()){
        return redirect()->route('login');
    }else{
        $id=Auth::user()->id;
        $cart=session()->get('cart');
        Order::create([
            'user_id'=>$id,
            'orders'=>$cart,
            'total_price'=>$r->total,
            'address'=>$r->address,
            'phone'=>$r->phone,
        ]);

         session()->remove('cart');
        $order_id= Order::where('user_id',$id)->get('id')->last();
         Notification::send(Auth::user(),new Orders($order_id));
         return redirect()->back();
    }
}

    /*********************/
    public function searchProducts(Request $r){
        $value=$r->search;
        $products = Product::with('category')
            ->where(function ($query) use ($value) {
                $query->where('id', 'like',"%$value%")
                    ->orWhere('product_name', 'like',"$value");
            })
            ->orWhereHas('category', function ($query) use ($value) {
                $query->where('category_name', 'like', $value);
            })
            ->get();
        return  view('search',compact('products'));

    }
    /***********************/
    public function showCategory($id){
     $products  = Product::where('category_id',$id)->get();
     return view('search',compact('products'));
    }

/**********************/
    public function showShop(){
        $products=Product::all();
        return view('shop',compact('products'));
    }
}

