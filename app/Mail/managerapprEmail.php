<?php

namespace App\Mail;
use App\qcpass;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class managerapprEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	 public $pass;
    public function __construct(qcpass $a)
    {
        //
		$this->pass = $a;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$address = 'helpdesk@esrnl.com';
		$name = 'QC Pass';
		$subject = 'Analysis Acknowledgement Notification';
		//$cemail = $this->pass->product->matgroup->qcSuperEmail;
        return $this->view('email.newApproval')
					->from($address, $name)
					->subject($subject);
    }
}
