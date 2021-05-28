<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class build_app extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'build_app {--test-server}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simple single command to help you build the entire app ecosystems.';

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
        if (!file_exists('.env')) {
            $this->info('.env file not detected in directory.');
            $this->info('Please configure your .env. We will generate .env file for you.');
            $this->info('After .env configured, run this command again.');
            copy('.env.example', '.env');
            Artisan::call('key:generate');
            exit();
        }
        if ($this->option('test-server')) {
            $this->info('It may take longer depend on your Server Disk Types: SSD/HDD.');
            Artisan::call('db:seed --class=ContactTest');
            $this->info('Massive Lag on the way xD.');
            $this->info('Contact Seed finish.');
            exit();
        }
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed --class=apage');
        Artisan::call('db:seed --class=BaseCMS');
        Artisan::call('db:seed --class=ipage');
        Artisan::call('db:seed --class=spage');
        Artisan::call('db:seed --class=UserSeeder');
        $this->info('App builded successfully.');
        $this->info('Web Profile by <bg=blue;fg=white>Albet Novendo</>, <bg=red;fg=white>Robby Tanizar</>');
        $this->info('Open it via: <bg=green;fg=white>http://127.0.0.1:8000</>');
        $this->info('CTRL + C to close. Next time, Run development server by <bg=green;fg=white>php artisan serve</>');
        Artisan::call('serve');
    }
}
