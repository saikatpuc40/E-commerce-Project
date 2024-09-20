<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('home/css/card.css')}}">
</head>

<body>
    @include('user.navbar')
    @foreach ($data as $product => $products)
        <div class="cards">

            <div class="image">
                <img src="{{ asset('images/' . $products->image)}}">
            </div>
            <div class="title">
                <h3>{{$products->title}}</h3>
            </div>
            <div class="des">
                <p>{{$products->description}}</p>
                @if($products->discount_price != null)

                    <p>
                        ${{$products->discount_price}}
                    </p>


                    <p style="text-decoration:line-through;">
                        ${{$products->price}}
                    </p>
                @else
                    <p>${{$products->price}}</p>

                @endif

            </div>
            <div class="add_cart">
                <a href="{{route('product.details', $products->id)}}" class="btn">Product Details</a>
                <form action="{{ route('cart', [$products->id]) }}" method="post">
                    @csrf
                    <div class="registration-form">
                        <input type="number" name="quantity" value="1" min="1">
                        <input type="submit" value="Add to Cart">
                    </div>
                </form>



            </div>



        </div>
    @endforeach
    <!-- <div class="d-flex justify-content-start">
    <p>
        Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} results
    </p>
    </div> -->
    <span class="d-flex justify-content-start" style="padding-top: 20px;">
        {!!$data->withQueryString()->links('pagination::bootstrap-5')!!}

    </span>


</body>

</html>