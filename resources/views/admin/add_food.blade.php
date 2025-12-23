<!DOCTYPE html>
<html>
  <head> 
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
                        <div class="juice-form-wrapper">
            <form action="{{url('upload_food')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="field">
                    <label for="">Food Title</label>
                    <input type="text" name="title" required>
                </div>
                <div class="field">
                    <label for="">Food details</label>
                    <textarea cols="50" rows="5" name="details" required></textarea>
                </div>
                <div class="field">
                    <label for="">Price</label>
                    <input type="text" name="price" required>
                </div>
                <div class="field">
                    <label for="">Image</label>
                    <input type="file" name="img" required>
                </div><br>
                <div class="field">
                    <input type="submit" value="Add Food" class="btn btn-warning">
                </div>
            </form>
    </div>
       </div>
    </div>
    @include('admin.js')
  </body>
</html>