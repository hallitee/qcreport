<?php

namespace App\Jobs;
use App\qcpass;
use Illuminate\Support\Facades\Mail;
use App\Mail\directapprEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class sendDirectApprovalMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
	 public pass;
    public function __construct(qcpass $a)
    {
        //
		$this->pass = $a;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       	Mail::to($this->pass->product->matgroup->qcManEmail)->send(new directapprEmail($this->pass));		
 
    }
}
