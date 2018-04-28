<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyClient extends Notification implements ShouldQueue

{
    use Queueable;
    protected $my_notification;     /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
          $this->my_notification = $msg; 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //$url = url('/invoice/'.$this->my_notification->id);

         return (new MailMessage)
                //>subject('Notification Subject')
                ->greeting('Hello!')
                ->line('You are approved , thanks for registeration')
                //->action('View Invoice', $url)
                ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
