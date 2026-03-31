<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Services\OrderService;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(private OrderService $orderService)
    {
    }
    public function index()
    {
        $orders = $this->orderService->getAllOrders();

        return response()->json([
            'message' => 'Pedidos obtenidos correctamente.',
            'data' => $orders,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request): JsonResponse
    {
        $data = $request->validated();

        $order = $this->orderService->createOrder($data);

        return response()->json([
            'message' => 'Pedido creado correctamente.',
            'data' => $order,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = $this->orderService->getOrderById($id);
        
        return response()->json([
            'message' => 'Pedido obtenido correctamente.',
            'data' => $order,
        ]);
    }


}
