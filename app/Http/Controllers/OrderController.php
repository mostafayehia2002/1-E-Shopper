<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function markAsRead(Request $r){
         if($r->user && $r->order) {
           $user_id = $r->user;
           $order_id=$r->order;
             DB::table('notifications')
                 ->where('data->order_id->id', $order_id)
                 ->where('notifiable_id', $user_id)
                 ->update(['read_at' => now()]);

         }
        return response()->json(['user_id'=>$user_id,'order_id'=>$order_id]);
    }
    //


    public function orderDone($order,$user)
    {
      Order::withoutTrashed()->where('id',$order)->forceDelete();
        DB::table('notifications')
            ->where('data->order_id->id', $order)
            ->where('notifiable_id', $user)->delete();
        return  redirect()->back()->with('order-done','The order has been sent successfully');
    }



}
