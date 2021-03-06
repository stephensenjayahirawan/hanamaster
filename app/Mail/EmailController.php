<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailController extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($details)
	{
		$this->details = $details;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->subject('Applying for '. $this->details['title'])
					->from('no-reply@hanamaster.co.id')
					->view('emails.template_email', $this->details)
					->attach($this->details['uploaded_file'])
					->replyTo('info@hanamaster.co.id')
					->to($this->details['mails_to']);

	}
}
