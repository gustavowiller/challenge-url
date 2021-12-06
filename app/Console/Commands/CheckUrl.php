<?php

namespace App\Console\Commands;

use App\Services\URLService;
use Illuminate\Console\Command;

class CheckUrl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'url:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the status code and get body response of Registered URLs';

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
        app(URLService::class)->checkAll();

        return Command::SUCCESS;
    }
}
