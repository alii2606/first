<?php

namespace App\Console\Commands;

use App\Mail\notifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email notify for all users';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $emails=User::select('email')->get();
        $data=['title'=>"programming",'body'=>"php"];
        foreach ($emails as $email){
            Mail::to($email)->send(new notifyEmail($data));
        }
    }
}
