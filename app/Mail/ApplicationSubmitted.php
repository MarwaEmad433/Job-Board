<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->view('emails.application_submitted')
                    ->with([
                        'name' => $this->application->name,
                        'email' => $this->application->email,
                        'phone' => $this->application->phone,
                        'resume' => $this->application->resume,
                    ]);
    }
}

