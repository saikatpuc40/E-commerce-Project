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
        <h2>Catagories Information</h2>
        <div style="display: flex; justify-content: center;">
              <a href="{{route('displayform')}}" class="btn btn-primary">Add Catagory</a>
        </div>



       
        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Catagory Name</th>
                    <th colspan=3>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $catagory=>$catagories)
                <tr>
                    <td>{{$catagories->id}}</td>
                    <td>{{$catagories->catagory}}</td>
                    <td><a href="{{route('catagory',$catagories->id)}}">View</a></td>
                    <td><a href="{{route('fetchdata.catagory',$catagories->id)}}">Update</a></td>
                    <td><a href="{{route('catagory_delete',$catagories->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
</body>
</html>