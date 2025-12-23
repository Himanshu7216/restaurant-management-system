<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="admin/img/himanshu.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Himanshu Thakor</h1>
            <p>Web Developer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{url('home')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('tables')}}"> <i class="icon-grid"></i>Tables </a></li>
                <li><a href="{{url('charts')}}"> <i class="fa fa-bar-chart"></i>Charts </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Food </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_food')}}">Add Food</a></li>
                    <li><a href="{{url('add_juice')}}">Add Juice</a></li>
                    <li><a href="{{url('view_food')}}">View Food</a></li>
                    <li><a href="{{url('view_Juice')}}">View Juice</a></li>
                  </ul>
                </li>

                <li>
                  <a href="{{url('orders')}}"> <i class="icon-new-file"></i>Orders </a>
                </li>

                <li>
                  <a href="{{url('reservation')}}"> <i class="icon-writing-whiteboard"></i>Reservation </a>
                </li>

        <ul class="list-unstyled">
          <li> <a href="#"> <i class="icon-settings"></i>Settings </a></li>
          
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
