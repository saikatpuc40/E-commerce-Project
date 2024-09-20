<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="{{asset('home/css/productform.css')}}"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include('admin.navsidebar');
    <!-- <div class="registration-form">
        <h1>Add New Product</h1>
                <form action="{{route('add.product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <p>Product Title:</p>
                        <input type="text" name="productTitle" required="">
                        <p>Product Description:</p>
                        <input type="text" name="productDescription" required="">
                        <p>Product Price:</p>
                        <input type="number" name="productPrice" required="">
                        <p>Discount Price:</p>
                        <input type="number" min="1" name="discountPrice">
                        <p>Product Quantity:</p>
                        <input type="number" name="productQuantity" min="0" required="">
                        <p>Product Catagory:</p>
                        <select name="productCatagory" required="">
                        <option value="">Add a catagory here</option>
                        @foreach ($data as $catagory_data=>$catagories_data)
                            <option value="{{$catagories_data->catagory}}">{{$catagories_data->catagory}}</option>
                        @endforeach
                        </select>
                        <p>Product Image:</p>
                        <input type="file" name="image" required="">
                        <button type="submit">Save</button>

                </form>
                
    </div> -->
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">{{ __('ADD NEW PRODUCT') }}</div>

                        <div class="card-body">
                            <form action="{{route('add.product')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="productTitle"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Product Title') }}</label>

                                    <div class="col-md-6">
                                        <input id="productTitle" type="text" name="productTitle"
                                            class="form-control @error('productTitle') is-invalid @enderror" name="productTitle"
                                     required autocomplete="productTitle" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="productDescription"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Product Description') }}</label>

                                    <div class="col-md-6">
                                        <input id="productDescription" type="text" name="productDescription" class="form-control @error('productDescription') is-invalid @enderror"
                                            name="productDescription"required autocomplete="">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="productPrice"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Product Price') }}</label>

                                    <div class="col-md-6">
                                        <input id="productPrice" type="number" name="productPrice"
                                            class="form-control @error('productPrice') is-invalid @enderror" name="productPrice"
                                            required autocomplete="phone">

                                        @error('productPrice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="discountPrice"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Discount Price') }}</label>

                                    <div class="col-md-6">
                                        <input id="discountPrice" type="number" min="1" name="discountPrice"
                                            class="form-control @error('address') is-invalid @enderror" name="discountPrice"
                                         required autocomplete="address" autofocus>

                                        @error('discountPrice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Quantity"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Product Quantity') }}</label>

                                    <div class="col-md-6">
                                        <input id="Quantity" type="number" name="productQuantity" min="0"
                                            class="form-control @error('productCatagory') is-invalid @enderror" name="productCatagory"
                                            required autocomplete="new-password">

                                        @error('productCatagory')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label
                                        class="col-md-4 col-form-label text-md-end">{{ __('Product Catagroy') }}</label>

                                    <div class="col-md-6">
                                    <select name="productCatagory" required="">
                                        <option value="">Add a catagory here</option>
                                        @foreach ($data as $catagory_data => $catagories_data)
                                            <option value="{{$catagories_data->catagory}}">{{$catagories_data->catagory}}
                                            </option>
                                        @endforeach
                                    </select>
                                     @error('productCatagory')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Product Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="file" name="image"
                                            class="form-control @error('image') is-invalid @enderror" name="image"
                                     required autocomplete="address" autofocus>

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>