<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        /* Wrapper */
.tables-wrapper{
    display: flex;
    gap: 25px;
    padding: 20px;
    flex-wrap: wrap;
}

/* Card */
.table-card{
    flex: 1;
    min-width: 400px;
    background: rgba(255,255,255,0.08);
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.4);
}

/* Title */
.table-title{
    color: #fff;
    margin-bottom: 15px;
    text-align: center;
}

/* Table */
.table-card table{
    width: 100%;
    border-collapse: collapse;
    color: #fff;
}

/* Head */
.table-card th{
    background: #1f2937;
    padding: 10px;
    text-align: center;
}

/* Body */
.table-card td{
    padding: 10px;
    border-bottom: 1px solid #444;
    text-align:center;
}

/* Row hover */
.table-card tr:hover{
    background: rgba(255,255,255,0.05);
}

/* More button */
.btn-more{
    padding: 6px 12px;
    background: #0dcaf0;
    color: #000;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
}

.btn-more:hover{
    background: #31d2f2;
}

    </style>
  </head>
  <body>
    @include('admin.header')
        
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

            <div class="tables-wrapper">

                <!-- FOODS TABLE -->
                <div class="table-card">
                    <h3 class="table-title">Foods</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>More</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($food_data as $food)
                            <tr>
                                <td>{{$food->id}}</td>
                                <td>{{$food->title}}</td>
                                <td>{{$food->price}}$</td>
                                <td>
                                    <a href="{{url('table/foods',$food->id)}}" class="btn-more">More</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- DRINKS TABLE -->
                <div class="table-card">
                    <h3 class="table-title">Drinks</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>More</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($juice_data as $juice)
                            <tr>
                                <td>{{$juice->id}}</td>
                                <td>{{$juice->title}}</td>
                                <td>{{$juice->price}}$</td>
                                <td>
                                    <a href="{{url('table/drinks',$juice->id)}}" class="btn-more">More</a>
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
