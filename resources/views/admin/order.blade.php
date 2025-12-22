<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table{
            border:1px solid skyblue;
            margin:auto;
            width: 1000px;
        }
        th{
            color:white;
            font-weight:bold;
            font-size:18px;
            text-align:center;
            background-color:red;
            padding:10px;
        }
        td{
            color:white;
            font-weight:bold;
            text-align:center;
            padding:10px;
        }

        .statusBtn a{
            margin:2px;
            width:110px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
        
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Food Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>change Status</th>
                </tr>

                @foreach($data as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>
                        <img  width="100" src="food_img/{{$data->image}}" alt="">
                    </td>
                    <td>{{$data->delivery_status}}</td>
                    <td class="statusBtn">
                        <a onClick="return confirm('Are you sure to change this ?')" href="{{url('on_the_way',$data->id)}}" class="btn btn-info">On The Way</a>
                        <a onClick="return confirm('Are you sure to change this ?')" href="{{url('Delivered',$data->id)}}" class="btn btn-warning">Delivered</a>
                        <a onClick="return confirm('Are you sure to change this ?')" href="{{url('Canceled',$data->id)}}" class="btn btn-danger">Cancel</a>
                    </td>
                    
                </tr>
                @endforeach
            </table>
            
        </div>
       </div>
    </div>
    @include('admin.js')
  </body>
</html>