<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\ServiceOrder;
use App\Models\InventoryItem;
use App\Models\Customer; // Import Customer Model

class AdminController extends Controller
{
    public function dashboard()
    {
        $salesCount = Sale::count(); // Get total number of sales
        $ordersCount = ServiceOrder::count(); // Get total number of service orders
        $inventoryCount = InventoryItem::count(); // Get total number of inventory items
        $customersCount = Customer::count(); // Get total number of customers

        return view('admin.dashboard', compact('salesCount', 'ordersCount', 'inventoryCount', 'customersCount'));
    }
}
