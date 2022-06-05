<?php

namespace Quarterloop\LoadTimeTile\Commands;

use Illuminate\Console\Command;
use Quarterloop\LoadTimeTile\Services\LoadTimeAPI;
use Quarterloop\LoadTimeTile\LoadTimeStore;
use Session;

class FetchLoadTimeCommand extends Command
{
    protected $signature = 'dashboard:fetch-load-time-data';

    protected $description = 'Fetch load time data';

    public function handle(LoadTimeAPI $loadTime_api)
    {

        $this->info('Fetching load time data ...');

        $loadTime = $loadTime_api::getLoadTime(
            Session::get('website'),
            config('dashboard.tiles.geekflare.key'),
        );

        LoadTimeStore::make()->setData($loadTime);

        $this->info('Stored data ...');

        $this->info('All done!');
    }
}
