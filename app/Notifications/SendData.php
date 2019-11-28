<?php

namespace App\Notifications;

use App\Candidate;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class SendData extends Notification
{
    use Queueable;

    private $candidate;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Candidate $candidate)
    {
        $this->candidate = $candidate;
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
        $data['name'] = $this->candidate->name; 
        $data['email'] = $this->candidate->email; 
        $data['password'] = ($this->candidate->password); 
        return (new MailMessage)
            ->subject('Dados de login')
            ->view(
                'email.data',
                [
                    "data" => $data,
                ]
            );
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
