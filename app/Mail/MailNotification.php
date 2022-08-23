<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $sender_name= getenv('MAIL_FROM_NAME');
        $sender_email= getenv('MAIL_FROM_ADDRESS');
        $subject= 'Appointment Booking Status';


        switch($this->data['status']){
            case 'Pending':
                return $this->from('bookings@gettheartiste.com', 'GetTheArtiste')
                ->subject($subject)->view('mail.appointment_pending')->with('data', $this->data);
            break;
            case 'Approved':
                return $this->from('bookings@gettheartiste.com', 'GetTheArtiste')
                ->subject($subject)->view('mail.appointment_approved')->with('data', $this->data);
            break;

            case 'Cancelled':
                return $this->from('bookings@gettheartiste.com', 'GetTheArtiste')
                ->subject($subject)->view('mail.appointment_cancelled')->with('data', $this->data);
                break;

        }

    }
}
