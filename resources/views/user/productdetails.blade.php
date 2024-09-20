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
    @foreach ($data as $product=>$products)
    <div class="cards">
    
        <div class="image">
            <img src="{{ asset('images/'.$products->image)}}">
        </div>  
        <div class="title">
            <h3>{{$products->title}}</h3>
        </div>
        <div class="des">
            <p>{{$products->description}}</p>
            @if($products->discount_price!=null)
    
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
            <form action="{{route('cart',$products->id)}}" method="Post">
                @csrf
                <div class="registration-form">
                        <input type="number" name="quantity" value="1" min="1">
                        <input type="submit" value="Add to cart">

               </div>
                
            </form>
            
        </div>
            
            
    
    </div>
@endforeach

    
</body>
</html>