<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;



class OrderController extends Controller
{

    public function __construct(private OrderService $orderService)
    {
    }

    public function index()
    {

        $data = [];

        $orders = $this->orderService->getAllOrders();

        $data['orders'] = $orders;
        
        return view('orders.index', $data);
    }
}
