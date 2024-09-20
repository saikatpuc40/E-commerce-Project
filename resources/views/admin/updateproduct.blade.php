<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('home/css/productform.css') }}">
</head>
<body>
@include('admin.navsidebar')
<div class="registration-form">
                <h1>Update Product</h1>
                <form action="{{route('update.product', $data->id)}}" method="post"enctype="multipart/form-data">
                    @csrf
                        <p>Product Title:</p>
                        <input type="text" name="productTitle" value="{{$data->title}}" required="">
                        <p>Product Description:</p>
                        <input type="text" name="productDescription" value="{{$data->description}}" required="">
                        <p>Product Price:</p>
                        <input type="number" name="productPrice" value="{{$data->price}}" required="">
                        <p>Discount Price:</p>
                        <input type="number" name="discountPrice" value="{{$data->discount_price}}">
                        <p>Product Quantity:</p>
                        <input type="number" name="productQuantity" value="{{$data->quantity}}" min="0" required="">
                        <p>Product Catagory:</p>
                        <select name="productCatagory" required="">
                        <option value="{{$data->catagory}}">{{$data->catagory}}</option>
                        @foreach ($value as $catagory_data=>$catagories_data)
                            <option value="{{$catagories_data->catagory}}">{{$catagories_data->catagory}}</option>
                        @endforeach
                        </select>
                        <p>Current Image:</p>
                        <img src="{{ asset('images/'.$data->image)}}" alt="" style="width:80px;height:80px;">
                        <p>Update Image:</p>
                        <input type="file" name="image" >
                        <button type="submit">Update</button>

                </form>
                
    </div>
    
</body>
</html>
    