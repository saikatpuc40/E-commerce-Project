<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('home/css/userpage.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('home/css/card.css')}}"> -->
</head>

<body>
    @include('user.navbar')
    <main style="margin-top:58px">
    <div class="container">
        <div id="carouselExample" class="carousel slide  orange-bg">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1>Headphone</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet minus quia eius, ad
                                autem natus fuga, quo amet dignissimos commodi, dolores ex? Quas similique eos
                                consequuntur eaque. Iure, beatae vitae!</p>
                            <h1 class="price">$500</h1>
                            <button class="buy_button">Buy Now</button>

                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('images/headphone.png') }}" class="d-block w-100" alt="...">

                        </div>
                    </div>

                </div>
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1>Mega LCD TV</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet minus quia eius, ad
                                autem natus fuga, quo amet dignissimos commodi, dolores ex? Quas similique eos
                                consequuntur eaque. Iure, beatae vitae!</p>
                            <h1 class="price">$500</h1>
                            <button class="buy_button">Buy Now</button>

                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('images/tv.png') }}" class="d-block w-100" alt="...">

                        </div>
                    </div>

                </div>
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1>Xbox</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet minus quia eius, ad
                                autem natus fuga, quo amet dignissimos commodi, dolores ex? Quas similique eos
                                consequuntur eaque. Iure, beatae vitae!</p>
                            <h1 class="price">$500</h1>
                            <button class="buy_button">Buy Now</button>

                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('images/xbox.png') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>

                </div>
            </div>


            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container">
    <div class="row">
        @foreach ($data as $product => $products)
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card h-100" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/' . $products->image) }}">
                    <div class="title">
                        <h3>{{ $products->title }}</h3>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="card-text flex-grow-1">
                            <p>{{ $products->description }}</p>
                            @if ($products->discount_price != null)
                                <p>${{ $products->discount_price }}</p>
                                <p style="text-decoration: line-through;">${{ $products->price }}</p>
                            @else
                                <p>${{ $products->price }}</p>
                            @endif
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('product.details', $products->id) }}" class="btn btn-primary">Product Details</a>
                            <form action="{{ route('cart', [$products->id]) }}" method="post">
                                @csrf
                                <div class="registration-form">
                                    <input type="number" name="quantity" value="1" min="1">
                                    <input type="submit" value="Add to Cart" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if (($product + 1) % 3 == 0)
                </div><div class="row">
            @endif
        @endforeach
    </div>
</div>





            <!-- <div class="cards">

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



                            </div> -->

            <!-- <div class="d-flex justify-content-start">
    <p>
        Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} results
    </p>
    </div> -->
            <span class="d-flex justify-content-start" style="padding-top: 20px;">
                {!!$data->withQueryString()->links('pagination::bootstrap-5')!!}

            </span>
    </main>


    @include('user.footer')



</body>

</html>