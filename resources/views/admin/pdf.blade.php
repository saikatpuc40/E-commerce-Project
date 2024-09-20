<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .invoice-box h2 {
            text-align: center;
            text-transform: uppercase;
            color: #333;
        }
        .invoice-header, .invoice-footer {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .invoice-header div, .invoice-footer div {
            width: 48%;
        }
        .invoice-header div h4, .invoice-footer div h4 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
            color: #666;
        }
        .invoice-header div p, .invoice-footer div p {
            margin: 4px 0;
            font-size: 16px;
        }
        .invoice-details {
            width: 100%;
            margin-top: 20px;
        }
        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-details table, .invoice-details th, .invoice-details td {
            border: 1px solid #ddd;
        }
        .invoice-details th, .invoice-details td {
            padding: 10px;
            text-align: left;
        }
        .invoice-details th {
            background-color: #f8f8f8;
        }
        .text-right {
            text-align: right;
        }
        .total-row td {
            font-weight: bold;
            background-color: #f8f8f8;
        }
        .payment-status {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
<div class="invoice-box">
        <h2>Invoice / Bill</h2>

        <!-- Customer Info -->
        @foreach ($data as $order => $data)
        <div class="invoice-header">
            <div>
                <h4>Customer Details</h4>
                <p><strong>Name:</strong> {{$data->name}}</p>
                <p><strong>Email:</strong> {{$data->email}}</p>
                <p><strong>Phone:</strong> {{$data->phone}}</p>
                <p><strong>Address:</strong> {{$data->address}}</p>
            </div>
            <div>
                <h4>Invoice Info</h4>
                <!-- <p><strong>Date:</strong> 15 September 2024</p> -->
            </div>
        </div>

        <!-- Product Details -->
        <div class="invoice-details">
            <table>
                <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data->product_title}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>{{$data->price}}</td>
                        
                    </tr>
                    <!-- Additional Products can be listed here -->
                </tbody>
                <!-- <tfoot>
                    <tr class="total-row">
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td>{{$data->price}}</td>
                    </tr>
                </tfoot> -->
            </table>
        </div>

        <!-- Footer with Payment Information -->
        <div class="invoice-footer">
            <div class="payment-status">
                <p><strong>Payment Status:</strong>{{$data->payment_status}} </p>
                <p><strong>Transaction ID:</strong> {{$data->transaction_id}}</p>
                <!-- <p><strong>Payment Method:</strong> Credit Card</p> -->
            </div>
            <div class="text-right">
                <p><strong>Total Amount Paid:</strong> {{$data->price}}</p>
            </div>
        </div>
        @endforeach 
    </div>
    
    
            


</body>

</html>