<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\ServiceOrder;
use App\Models\InventoryItem;
use App\Models\Customer;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'salesCount'    => Sale::count(),
            'ordersCount'   => ServiceOrder::count(),
            'inventoryCount'=> InventoryItem::count(),
            'customersCount'=> Customer::count(),
        ]);
    }
}
