<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class VerifiyMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run jobs to verify user mail';

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
        return 0;
    }
}
