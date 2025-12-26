<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('home')}}">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{url('home#gallary')}}">Gallary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('home#book-table')}}">Book-Table</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="{{url('/')}}">
                <img src="assets/imgs/logo.svg" class="brand-img" alt="">
                <span class="brand-txt">Food Hut</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('home#blog')}}">Food<span class="sr-only">(current)</span></a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('my_cart')}}">Cart</a>
                        </li>

                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <input type="submit" value="Logout" class="btn btn-primary ml-xl-4">
                        </form>

                @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                @endif
                
            </ul>
        </div>
    </nav>
    <br><br><br><br>
    <div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
        <div class="container mt-5 pt-5 text-light">
            <div class="card bg-dark shadow-lg border-0">
                <div class="card-body">
                    <h3 class="text-center mb-4">🛒 Your Cart</h3>

                    <div class="table-responsive">
                        <table class="table table-dark table-bordered table-hover text-center align-middle">
                            <tr class="table-danger text-dark">
                                <th>Food</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            
                            <?php
                                $total_price=0;

                            ?>

                            @foreach($data as $data)
                            <tr>
                                <td>{{$data->title}}</td>
                                <td>${{$data->price}}</td>
                                <td>{{$data->quantity}}</td>
                                <td>
                                    @if(file_exists(public_path('food_img/'.$data->image)))
                                        <img src="{{ asset('food_img/'.$data->image) }}" class="img-fluid rounded" style="max-width:120px;">
                                    @elseif(file_exists(public_path('juice_img/'.$data->image)))
                                        <img src="{{ asset('juice_img/'.$data->image) }}" class="img-fluid rounded" style="max-width:120px;">
                                    @endif

                                </td>
                                <td>
                                    <a onClick="return confirm('Are you sure to delete these ?')" href="{{url('remove_cart',$data->id)}}" class="btn btn-danger">Remove</a>
                                </td>
                            </tr>

                            <?php
                            $total_price=$total_price + $data -> price ;
                            ?>

                            @endforeach
                        </table>
                    </div>

                    <h4 class="text-end mt-4 text-warning">
                    Total Price: ${{$total_price}}
                    </h4>
                </div>
            </div>
        </div>

        <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-light shadow-lg">
                    <div class="card-body">
                        <h4 class="text-center mb-4">🚚 Delivery Details</h4>

                        <form action="{{url('confirm_order')}}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" value="{{Auth()->user()->name}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" value="{{Auth()->user()->email}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="number" name="phone" value="{{Auth()->user()->phone}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="2">{{Auth()->user()->address}}</textarea>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-success btn-lg"
                                    onclick="alert('Your Order is in Progress... Thank You!')">
                                    Confirm Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>


    


    