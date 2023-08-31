<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{

    //
    public function markAsRead(Request $r){
        DB::table('notifications')
            ->where('data->message_id->id',$r->message)
            ->where('notifiable_id',$r->user)
            ->update(['read_at' => now()]);
        }
    public function deleteMessage($message,$user)
    {
        Contact::where('id',$message)->delete();

          DB::table('notifications')
            ->where('data->message_id->id', $message)
            ->where('notifiable_id',$user)->delete();
        return  redirect()->back()->with('message-done','The message Has been Deleted successfully');

    }
}
