<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
        <style>
        label{
            display: inline-block;
            width: 200px;
            color:white;
        }
        .field{
            padding:10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
        
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Update Food</h1>

            <form action="{{url('/edit_food/'.$food->id)}}" method="post" enctype="multipart/form-data"> >
                @csrf
                <div class="field">
                    <label for="">Food Title</label>
                    <input type="text" name="title" value="{{$food->title}}">
                </div>
                <div class="field">
                    <label for="">Food details</label>
                    <textarea cols="50" rows="5" name="details" >{{$food->details}}</textarea>
                </div>
                <div class="field">
                    <label for="">Price</label>
                    <input type="text" name="price" value="{{$food->price}}">
                </div>
                <div class="field">
                    <label for="">Current Image</label>
                    <img width="150" src="food_img/{{$food->image}}" alt="">
                    
                </div>
                <div class="field">
                    <label for="">Change Image</label>
                    <input type="file" name="img">
                    
                </div>
                <div class="field">
                    <input type="submit" value="Update Food" class="btn btn-warning">
                </div>
            </form>


            
        </div>
       </div>
    </div>
    @include('admin.js')
  </body>
</html>