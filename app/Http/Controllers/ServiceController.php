<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of service orders.
     */
    public function orders()
    {
        // TODO: Replace [] with your actual ServiceOrder model query
        $orders = [];

        return view('service.orders', compact('orders'));
    }
}
