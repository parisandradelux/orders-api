<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 40px;
        }

        h1 {
            color: #333;
            margin-bottom: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        th {
            background-color: #010101;
            color: white;
            padding: 14px 16px;
            text-align: left;
        }

        td {
            padding: 12px 16px;
            border-bottom: 1px solid #eee;
            color: #444;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .status-pending {
            color: #f59e0b;
            font-weight: bold;
        }

        .status-processed {
            color: #10b981;
            font-weight: bold;
        }

        .status-failed {
            color: #ef4444;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            color: #999;
            padding: 24px;
        }

    </style>
</head>
<body>

    <h1>Lista de Pedidos</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Email</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Dato Externo</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @if($orders->isEmpty())
                <tr>
                    <td colspan="7" class="empty">
                        No hay pedidos registrados.
                    </td>
                </tr>
            @endif

            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                    <td class="status-{{ $order->status }}">
                        {{ ucfirst($order->status) }}
                    </td>
                    <td>{{ $order->external_data ?? 'Pendiente...' }}</td>
                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>
</html>