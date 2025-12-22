<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
        <style>
        table{
            border: 1px solid skyblue;
            margin: 100px auto 0;
            width: 1000px;
        }
        th{
            background: skyblue;
            color:white;
            padding: 20px;
            font-size:18px;
            text-align:center;
        }
        td{
            color:white;
            padding: 10px;
            text-align:center;
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
                    <th>Phone Number</th>
                    <th>No. Of Guest</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                @foreach($book as $book)
                <tr>
                    <td>{{$book->phone}}</td>
                    <td>{{$book->guest}}</td>
                    <td>{{$book->date}}</td>
                    <td>{{$book->time}}</td>
                </tr>
                @endforeach
            </table>
            
        </div>
       </div>
    </div>
    @include('admin.js')
  </body>
</html>