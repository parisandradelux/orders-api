<?php

namespace App\Services;

use App\Models\Order;
use App\Jobs\ProcessOrderJob;

class OrderService
{
    public function createOrder(array $data): Order
    {
        $order = Order::create([
            'customer_name'  => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'total_amount'   => $data['total_amount'],
            'status'         => 'pending',
        ]);

        ProcessOrderJob::dispatch($order);

        return $order;
    }

    public function getAllOrders()
    {
        return Order::latest()->get();
    }

    public function getOrderById(int $id): Order
    {
        return Order::findOrFail($id);
    }
}