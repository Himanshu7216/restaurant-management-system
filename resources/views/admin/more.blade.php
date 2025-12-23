<!DOCTYPE html>
<html>
  <head> 
    <base href="/">
    @include('admin.css')
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">

    <style>
        .more-card{
            max-width: 900px;
            margin: 40px auto;
            background: rgba(255,255,255,0.08);
            padding: 30px;
            border-radius: 15px;
            display: flex;
            gap: 30px;
            color: #fff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
        }

        .more-card img{
            width: 320px;
            height: 240px;
            object-fit: cover;
            border-radius: 12px;
        }

        .more-details h1{
            margin-bottom: 10px;
        }

        .price{
            color: #ffc107;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .back-btn{
            margin-top: 20px;
            display: inline-block;
            padding: 8px 16px;
            background: #0dcaf0;
            color: #000;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
        
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <div class="more-card">

                    <div>
                        <img src="/{{ $type == 'food' ? 'food_img' : 'juice_img' }}/{{ $item->image }}">
                    </div>

                <div class="more-details">
                    <h1>{{ $item->title }}</h1>

                    <div class="price">
                        ₹ {{ $item->price }}
                    </div>

                    <p>
                        {{ $item->details }}
                    </p>

                    <a href="{{ url('/tables') }}" class="back-btn">⬅ Back to Tables</a>
                </div>

            </div>

            
        </div>
       </div>
    </div>
    <script src="{{ asset('admin/js/script.js') }}"></script>

    @include('admin.js')
  </body>
</html>