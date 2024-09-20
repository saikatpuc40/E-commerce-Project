<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="home/css/form.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('admin.navsidebar');
    <div class="container mt-20px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Catagory') }}</div>

                    <div class="card-body">
                        <form action="{{route('add.catagory')}}" method="post">
                            @csrf
                            <div>
                                <label>Catagory</label>
                                <div>
                                    <input
                                        class="form-control @error('email') is-invalid @enderror" name="catagoryName" required autocomplete="" autofocus>

                                    @error('Catagory')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div>
                                    <button class="btn btn-primary">
                                          Save
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


    <!-- <div class="registration-form">
        <h1>Add new Category</h1>
                <form action="{{route('add.catagory')}}" method="post">
                    @csrf
                        <p>Category:</p>
                        <input type="text" name="catagoryName" id="catagory">
                        <button  id="but1" type="submit">Save</button>

                </form>
                
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>
