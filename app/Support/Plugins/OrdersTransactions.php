<?php

namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class OrdersTransactions extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('Orders & Transactions'))
            ->route('orders.index')
            ->icon('fas fa-money-bill-wave')
            ->active("orders*")
            ->permissions('transactions-orders.manage');
    }
}