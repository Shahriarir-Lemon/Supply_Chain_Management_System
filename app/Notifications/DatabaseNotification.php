<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DatabaseNotification extends Notification
{
    use Queueable;
   public $user;
   
    public function __construct($user)
    {
        $this->user = $user;
    }

  
    public function via(object $notifiable): array
    {
        return ['database'];
    }

 
    public function toArray(object $notifiable): array
    {

        $role = null;

        if (auth()->user()->Role == 'Manufacturer') 
                {
                    $link = route('manufacturer_order'); 
                }
                 elseif (auth()->user()->Role == 'Distributor')
                 {
                    $link = route('all_request'); 
                } 
                elseif (auth()->guard('customer')->user()->Role == 'Customer')
                {
                   $link = route('customer_order'); 
               } 
              
                else 
                {
                    
                }

                return [
                    'name'=>$this->user['user_name'],
                    'role'=>$this->user['Role'],
                    'link' => $link,
                ];
    }
}
