<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home/css/table.css">
</head>
<body>
@include('user.navbar')
<div>
        <h2>My Products</h2>
        <table class="content-table">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Transcation Id</th>
                    <th>Image</th>
                    <th>Bill</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $order=>$orders)
                <tr>
                    <td>{{$orders->product_title}}</td>
                    <td>${{$orders->price}}</td>
                    <td>{{$orders->quantity}}</td>
                    <td>{{$orders->payment_status}}</td>
                    <td>{{$orders->delivery_status}}</td>
                    <td>{{$orders->transaction_id}}</td>
                    <td><img src="{{ asset('images/'.$orders->image)}}" alt="" style="width:80px;height:80px;"></td>
                    <td>
                           @if($orders->payment_status == 'paid')
                            <a href="{{route('print.pdf',$orders->id)}}">Download Bill</a>
                           @endif
                    </td>

                    
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    
</body>
</html>