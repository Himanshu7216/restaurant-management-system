
    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <h2 class="section-title py-5">Today’s Popular Bites</h2>
        <div class="row justify-content-center">
            <div class="col-sm-7 col-md-4 mb-5">
                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#foods" role="tab" aria-controls="pills-home" aria-selected="true">Food Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#juices" role="tab" aria-controls="pills-profile" aria-selected="false">Drinks & Juices</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    @foreach($food_data as $food)
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3 my-md-0">
                            <img height="200" src="food_img/{{$food->image}}" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">{{$food->price}}$ </a></h1>
                                <h4 class="pt20 pb20">{{$food->title}}</h4>
                                <p class="text-white">{{$food->details}}</p>
                            </div>
                            <form action="{{url('add_cart',$food->id)}}" method="POST">
                                @csrf
                                <div>
                                <input style="padding:4px;border-radius:5px;" type="number" name="quantity" min="1" value="1" required>
                                <input type="submit" class="btn btn-info" value="Add to Cart">
                                </div>
                                
                            </form>
                            <br><br><br>
                        </div>
                    </div>
                    
                    @endforeach
                    
                </div>
            </div>
            <div class="tab-pane fade" id="juices" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                    @foreach($juice_data as $juice)
                    <div class="col-md-4 my-3 my-md-0">
                        <div class="card bg-transparent border">
                            <img height="200" src="juice_img/{{$juice->image}}" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">{{$juice->price}}</a></h1>
                                <h4 class="pt20 pb20">{{$juice->title}}</h4>
                                <p class="text-white">{{$juice->details}}</p>
                            </div>
                            <form action="{{url('add_cart',$juice->id)}}" method="POST">
                                @csrf
                                <div>
                                <input style="padding:4px;border-radius:5px;" type="number" name="quantity" min="1" value="1" required>
                                <input type="submit" class="btn btn-info" value="Add to Cart">
                                </div>
                                
                            </form>
                            <br><br><br>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>

