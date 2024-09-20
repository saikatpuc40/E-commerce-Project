<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('home/css/form.css') }}">
</head>
<body>
@include('admin.navsidebar')
<div class="registration-form">
                <h1>Update Catagory</h1>
                <form action="{{route('update.catagory', $data->id)}}" method="post">
                    @csrf
                        <p>Category:</p>
                        <input type="text" name="catagoryName" value="{{$data->catagory}}"id="catagory">
                        <button type="submit">Update</button>

                </form>
                
    </div>
    
</body>
</html>
    