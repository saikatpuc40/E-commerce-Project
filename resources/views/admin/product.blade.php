<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('home/css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/modal.css') }}">
</head>
<body>
    @include('admin.navsidebar')
    <div>
        <h2>Products Information</h2>
        <table class="content-table">
            <thead>
                <tr>
                <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Quantity</th>
                    <th>Catagory</th>
                    <th>Image</th>
                    <th colspan=2>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $product=>$products)
                <tr>
                    <td>{{$products->title}}</td>
                    <td>{{$products->description}}</td>
                    <td>{{$products->price}}</td>
                    <td>{{$products->discount_price}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>{{$products->catagory}}</td>
                    <td><img src="{{ asset('images/'.$products->image)}}" alt="" style="width:80px;height:80px;"></td>
                    <td><a href="#">Update</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
</body>
</html>