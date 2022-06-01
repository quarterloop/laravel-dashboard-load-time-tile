<?php

namespace Quarterloop\LoadTimeTile\Commands;

use Illuminate\Console\Command;
use Quarterloop\LoadTimeTile\Services\LoadTimeAPI;
use Quarterloop\LoadTimeTile\LoadTimeStore;

class FetchLoadTimeCommand extends Command
{
    protected $signature = 'dashboard:fetch-load-time-data';

    protected $description = 'Fetch load time data';

    public function handle(LoadTimeAPI $loadTime_api)
    {

        $this->info('Fetching load time data ...');

        $loadTime = $loadTime_api::getLoadTime(
            config('dashboard.tiles.hosting.url'),
            config('dashboard.tiles.load-time.key'),
        );

        LoadTimeStore::make()->setData($ttfb);

        $this->info('Stored data ...');

        $this->info('All done!');
    }
}
