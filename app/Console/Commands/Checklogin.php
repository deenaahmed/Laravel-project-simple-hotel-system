<?php

namespace App\Console\Commands;

use App\Notifications\WelcomeBack;
use Illuminate\Console\Command;
use App\User;
use Carbon\Carbon;

class Checklogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:last-login';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check lastlogin date for the user';

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
     * @return mixed
     */
    public function handle()
    {
      // \Log::info('iam here @'.\Carbon\Carbon::now());

        $users=User::all();

        foreach ($users as $user)
        {
           $now= Carbon::now()->timestamp ;
           $lastlogin=$user->last_login;
          $duration=$now-$lastlogin;
          $days=$duration/(60 * 60 * 24);

       if( $days>30)
             {
              $user->notify(new WelcomeBack($user->name ,'30 day'));

             }


        }




    }
}
