<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearCustomCache extends Command
{
    protected $signature = 'cache:clear-custom';
    protected $description = 'Clear custom application caches (categories, products, etc)';

    public function handle()
    {
        // Clear specific cache keys
        Cache::forget('navbar_categories');

        $this->info('Custom caches cleared successfully!');
        $this->info('Cleared: navbar_categories');

        return 0;
    }
}
