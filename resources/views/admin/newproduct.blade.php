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
        <h2>Products Information</h2>
        <div style="display: flex; justify-content: center;">
            <a href="{{ route('productform') }}" class="btn btn-primary">Add Product</a>
        </div>


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
                    <th colspan=3>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $product => $products)
                    <tr>
                        <td>{{$products->title}}</td>
                        <td>{{$products->description}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->discount_price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>{{$products->catagory}}</td>
                        <td><img src="{{ asset('images/' . $products->image)}}" alt="" style="width:80px;height:80px;"></td>
                        <td><a href="{{route('product', $products->id)}}">View</a></td>
                        <td><a href="{{route('fetchdata.product', $products->id)}}">Update</a></td>
                        <td><a href="{{route('delete.product', $products->id)}}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>

</html>