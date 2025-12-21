<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table{
            border: 2px solid skyblue;
            margin: auto;
            width: 800px;
        }
        th{
            background: skyblue;
            color:white;
            padding: 10px;
            margin: 10px;
        }
        td{
            color:white;
            padding: 10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
        
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

            <div>
                <table>
                    <tr>
                        <th>Food Title</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>

                    @foreach($data as $data)

                    <tr>
                        <td>{{$data->title}}</td>
                        <td>{{$data->details}}</td>
                        <td>{{$data->price}}</td>
                        <td>
                            <img  width="150" src="/food_img/{{$data->image}}">
                        </td>
                        <td>
                            <a class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this food item?')" href="{{url('/delete_food',$data->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{url('update_food',$data->id)}}">Update</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            
        </div>
       </div>
    </div>
    @include('admin.js')
  </body>
</html>