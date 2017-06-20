<?php

namespace App\Notifications;

class UserRegistered extends \Illuminate\Notifications\Notification
{
    protected $email;
    protected $code;

    public function __construct($email, $code)
    {
        $this->email = $email;
        $this->code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [\LaravelDoctrine\ORM\Notifications\DoctrineChannel::class];
    }

    /**
     * @param $notifiable
     * @return $this
     */
    public function toEntity($notifiable)
    {
        return (new \App\Entity\Management\Notification)
            ->to($notifiable)
            ->success()
            ->message('Some message')
            ->action('Bla', 'http://test.nl');
    }
}