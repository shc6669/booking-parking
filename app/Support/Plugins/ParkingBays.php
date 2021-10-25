<?php

namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class ParkingBays extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('Parking Bays'))
            ->route('parking-bays.index')
            ->icon('fas fa-parking')
            ->active("parking-bays*")
            ->permissions('parking.manage');
    }
}