<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home/css/table.css">
</head>

<body>
    @include('admin.navsidebar')
    <div>
        <h2>All orders</h2>
        <div style="padding-left:700px;">
            <form action="{{route('search')}}" method="get">
                @csrf
                <input type="text" name="search" placeholder="search">
                <input type="submit" value="search">

            </form>

        </div>
        <table class="content-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>phone</th>
                    <th>address</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Delivered</th>
                    <th>Bill</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($data as $order => $orders)
                    <tr>
                        <td>{{$orders->name}}</td>
                        <td>{{$orders->email}}</td>
                        <td>{{$orders->phone}}</td>
                        <td>{{$orders->address}}</td>
                        <td>{{$orders->product_title}}</td>
                        <td>{{$orders->price}}</td>
                        <td>{{$orders->quantity}}</td>
                        <td><img src="{{ asset('images/' . $orders->image)}}" alt="" style="width:80px;height:80px;"></td>
                        <td>{{$orders->payment_status}}</td>
                        <td>{{$orders->delivery_status}}</td>
                        <td>
                            @if($orders->delivery_status == 'processing')
                                <a href="{{route('delivered', $orders->id)}}"
                                    onclick="return confirm('Are you sure  this product delivered')">Delivered</a>
                            @else

                                <p style="color: green;">Delivered</p>



                            @endif

                        </td>
                        <td>
                           @if($orders->payment_status == 'paid')
                            <a href="{{route('print.pdf',$orders->id)}}">Download Bill</a>
                           @endif
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="14">
                            No Data Found

                        </td>
                    </tr>

                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>