<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class SetupDevEnvironment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the development environment';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Setting up development environment');

        // Generate application key
        $this->call('key:generate');

        // Drop all tables, run migrations and seed
        $this->call('migrate:fresh', ['--seed' => true]);

        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->info('All done. Have fun!');
    }
}
