<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOperationsController extends Controller
{
    //
    public function  showAdmins()
    {
         $admins=Admin::orderBy('created_at', 'desc')->get();
        return view('admin.show_admins',compact('admins'));
    }

    public function  showUsers(){

     $users=User::orderBy('created_at', 'desc')->get();
        return view('admin.show_users',compact('users'));
    }
    public function  showProducts(){
        $products=Product::with('category')->orderBy('created_at', 'desc')->get();
        return view('admin.show_products',compact('products'));
    }
    public function  showOrders(){

        $orders=Order::with('user')->orderBy('created_at', 'desc')->get();
         return view('admin.show_orders',compact('orders'));

    }

    public function  showCategories(){
        $categories=Category::orderBy('created_at', 'desc')->get();
        return view('admin.show_categories',compact('categories'));
//
    }


    public function showContacts(){
        $messages=Contact::orderBy('created_at', 'desc')->get();
        return view('admin.show_contacts',compact('messages'));
    }
}
