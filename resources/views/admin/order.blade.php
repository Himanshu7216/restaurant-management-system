<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .table-responsive{
    width:100%;
    overflow-x:auto;
}

.order-table{
    width:100%;
    min-width:1400px;   /* keeps all columns visible */
    border-collapse: collapse;
    border:1px solid skyblue;
}

.order-table th{
    background:red;
    color:white;
    padding:12px;
    white-space:nowrap;
    font-size:16px;
    text-align:center;
}

.order-table td{
    color:white;
    padding:12px;
    white-space:nowrap;
    text-align:center;
}

.order-table img{
    width:120px;
    border-radius:8px;
}

.statusBtn a{
    display:block;
    margin:5px 0;
    width:120px;
}

    </style>
  </head>
  <body>
    @include('admin.header')
        
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
        <div class="table-responsive">
            <table class="order-table">
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
                    <td>{{$data->price}}$</td>
                    <td>{{$data->quantity}}</td>
                    <td>
                        
                        @if(file_exists(public_path('food_img/'.$data->image)))
                        <img width="150" src="{{ asset('food_img/'.$data->image) }}" alt="">
                    @elseif(file_exists(public_path('juice_img/'.$data->image)))
                        <img width="150" src="{{ asset('juice_img/'.$data->image) }}" alt="">
                    @endif
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
    </div>
    @include('admin.js')
  </body>
</html>