<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
        
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover table-bordered align-middle text-center">
                                <thead  class="table-secondary text-dark">
                                    <tr>
                                        <th>Juice Title</th>
                                        <th>Details</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Delete</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($juice_data as $juice)

                                    <tr>
                                        <td>{{$juice->title}}</td>
                                        <td>{{$juice->details}}</td>
                                        <td>{{$juice->price}}</td>
                                        <td>
                                            <img  width="150" src="/juice_img/{{$juice->image}}">
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this food item?')" href="{{url('/delete_juice',$juice->id)}}">Delete</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning" href="{{url('update_juice',$juice->id)}}">Update</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>


            </div>
       </div>
    </div>
    @include('admin.js')
  </body>
</html>