<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Orders extends Notification
{
    use Queueable;

public  $order_id;
    public function __construct($id)
    {
        //
        $this->order_id=$id;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            //
            'order_id'=>$this->order_id,
            'type'=>'order'
        ];
    }
}
