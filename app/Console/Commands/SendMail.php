<?php

namespace App\Console\Commands;

use App\Mail\DailyQuote;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to subscribers daily';

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
        $quotesCount = Quote::count();
        $users = User::where('status', '<>', 'inactive')->get();
        $quote = Quote::find(rand() % $quotesCount);

        foreach($users as $user)
        {
            Mail::to($user->email)->send(new DailyQuote($quote));
        }
    }
}
