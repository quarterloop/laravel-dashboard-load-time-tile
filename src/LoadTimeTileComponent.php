<?php

namespace Quarterloop\LoadTimeTile;

use Livewire\Component;
use Illuminate\Support\DB;

class LoadTimeTileComponent extends Component
{

    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }


    public function render()
    {

      $loadTimeStore = LoadTimeStore::make();

        return view('dashboard-load-time-tile::tile', [
            'website'         => config('dashboard.tiles.hosting.url'),
            'times'            => $ttfbStore->getData()['data'],
            'lastUpdateTime'  => date('H:i:s', strtotime($ttfbStore->getLastUpdateTime())),
            'lastUpdateDate'  => date('d.m.Y', strtotime($ttfbStore->getLastUpdateDate())),
        ]);
    }
}
