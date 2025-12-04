<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }} - Invoice</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .invoice-box {
            background: #fff;
            padding: 20px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
            max-width: 900px;
            margin: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        table th {
            background: #f2f2f2;
        }
        .text-right { text-align: right; }
        .total { font-weight: bold; font-size: 18px; }
    </style>
</head>

<body>

<div class="invoice-box">

    <div style="display:flex; justify-content: space-between;">
        <div>
            <h2>Invoice</h2>

            <p><strong>Email:</strong> {{ $invoice['email'] ?? '-' }}</p>

            <p>
                <strong>Shipping Address:</strong><br>
                {{ $invoice['user']['receiver_name'] ?? '-' }}<br>
                {{ $invoice['user']['address_detail'] ?? '-' }}
            </p>
        </div>

        <div>
            <h4>{{ $invoice['invoice_number'] ?? '-' }}</h4>
            <p><strong>Order ID:</strong> {{ $invoice['id'] ?? '-' }}</p>
        </div>
    </div>

    {{-- Table Items --}}
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Store</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($invoice['order_details'] as $item)
                @php
                    $qty = $item['qty'];
                    $price = $item['product']['basic_price'];
                    $subtotal = $qty * $price;
                @endphp

                <tr>
                    <td>{{ $item['product']['name'] }}</td>

                    <td>{{ $item['store']['name'] ?? '-' }}</td>

                    <td>{{ $qty }}</td>

                    <td>
                        Rp {{ number_format($price, 0, ',', '.') }}
                    </td>

                    <td>
                        Rp {{ number_format($subtotal, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-right total" style="margin-top: 15px;">
        Total: Rp {{ number_format($invoice['final_amount'], 0, ',', '.') }}
    </div>

</div>

</body>
</html>
