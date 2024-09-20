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
        <h2>Buying Products</h2>
        <table class="content-table">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $Total_Price = 0; ?>
                @foreach ($data as $carts => $cart)
                    <tr>
                        <td>{{$cart->product_title}}</td>
                        <td>${{$cart->price}}</td>
                        <td>{{$cart->quantity}}</td>
                        <td><img src="{{ asset('images/' . $cart->image)}}" alt="" style="width:80px;height:80px;"></td>
                        <td><a href="{{route('remove.cart', $cart->id)}}"
                                onclick="return confirm('Are you sure to remove this product?')">Remove</a></td>
                    </tr>

                    <?php    $Total_Price = $Total_Price + $cart->price; ?>
                @endforeach

            </tbody>
        </table>
        <div>
            <h2>Total Price:${{$Total_Price}}</h2>
        </div>
        <div>
            <h2>Proceed to Order</h2>
            <div class="d-flex justify-content-center" style="padding-top: 20px;">
                <a href="{{route('cash.order')}}" class="btn btn-primary" style="margin-right: 10px;">Cash On
                    Delivery</a>
                <a href="{{route('stripe', $Total_Price)}}" class="btn btn-success">Pay Using Card</a>
            </div>


            <!-- <a href="{{route('cash.order')}}">Cash On Delivery</a>
            <a href="{{route('stripe',$Total_Price)}}">Pay Using Card</a> -->
        </div>
    </div>

</body>

</html>