<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update data in the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        DB::update("UPDATE cottage SET status = 'Available';");


        return Command::SUCCESS;
    }
}
