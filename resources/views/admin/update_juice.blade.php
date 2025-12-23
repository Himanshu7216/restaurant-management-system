<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
        <style>
                        /* Wrapper */
        .juice-form-wrapper form{
            max-width: 600px;
            margin: 0px auto;
            background: rgba(255,255,255,0.08);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        }

        /* Labels */
        .juice-form-wrapper label{
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #f1f1f1;
        }

        /* Fields */
        .juice-form-wrapper .field{
            margin-bottom: 18px;
        }

        /* Inputs */
        .juice-form-wrapper input[type="text"],
        .juice-form-wrapper input[type="file"],
        .juice-form-wrapper textarea{
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #555;
            background: #1e1e2f;
            color: #fff;
            outline: none;
            transition: 0.3s;
        }

        /* Focus */
        .juice-form-wrapper input:focus,
        .juice-form-wrapper textarea:focus{
            border-color: #ffc107;
            box-shadow: 0 0 0 2px rgba(255,193,7,0.25);
        }

        /* Submit */
        .juice-form-wrapper input[type="submit"]{
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Hover */
        .juice-form-wrapper input[type="submit"]:hover{
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255,193,7,0.4);
        }
    </style>
  </head>
  <body>
    @include('admin.header')
        
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="juice-form-wrapper">
            <form action="{{url('/edit_juice/'.$juice->id)}}" method="post" enctype="multipart/form-data"> 
                @csrf
                <div class="field">
                    <label for="">Juice Title</label>
                    <input type="text" name="title" value="{{$juice->title}}">
                </div>
                <div class="field">
                    <label for="">Juice details</label>
                    <textarea cols="50" rows="5" name="details" >{{$juice->details}}</textarea>
                </div>
                <div class="field">
                    <label for="">Price</label>
                    <input type="text" name="price" value="{{$juice->price}}">
                </div>
                <div class="field">
                    <label for="">Current Image</label>
                    <img width="150" src="juice_img/{{$juice->image}}" alt="">
                    
                </div>
                <div class="field">
                    <label for="">Change Image</label>
                    <input type="file" name="img">
                    
                </div>
                <div class="field">
                    <input type="submit" value="Update Juice" class="btn btn-warning">
                </div>
            </form>
        </div>         
        </div>
       </div>
    </div>
    @include('admin.js')
  </body>
</html>