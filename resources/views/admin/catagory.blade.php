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
        <h2>Catagories Information</h2>
        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Catagory Name</th>
                    <th colspan=2>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $catagory=>$catagories)
                <tr>
                    <td>{{$catagories->id}}</td>
                    <td>{{$catagories->catagory}}</td>
                    <td><a href="{{route('fetchdata.catagory', $catagories->id)}}">Update</a></td>
                    <td><a href="{{route('catagory_delete',$catagories->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
</body>
</html>