<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

// use Mail;
class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employes:SendMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email Using Cron';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $employes = DB::table('employes')->select('email')->get();
        $emails = [];
        foreach ($employes as $email) {
            $emails[] = $email->email;
        }
        Mail::send('emails.email', [], function ($message) use ($emails) {
            $message->to($emails)->subject("This Is Cron Heading");
        });
        return 0;
    }
}
