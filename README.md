0.  Installation & Create project
     required :- Laravel ,Node, Xampp


    composer create-project laravel/laravel Restorant
    cd Restorant
    composer require laravel/jetstream
    php artisan jetstream:install livewire
    npm install
    npm run build

     <!-- set database environment in .env file 
     & create database  -->
     <!--   DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=MyRestorant
            DB_USERNAME=root
            DB_PASSWORD= -->

    php artisan make:migration create_users_table
     <!-- edit table -->
    php artisan migrate

    php artisan serve

1.  edit register/login setup

    view\Auth\register.blage.php
    <!-- add two fields (phone,address) -->
    App\Actions\Fortify\CreateNewUser.php
    <!-- add fields and validation -->
    App\Models\User.php
    <!-- in (protected $fillable) add field -->

2.  user/admin dashbord

    config\fortify.php
    <!-- define login route -->
    'home' => '/home',

    <!-- make controller -->
    php artisan make:controller HomeController
     <!-- create login route -->
    routes\web.php  
    Route::get('/home',[HomeController::class,'index']);
    App\Http\Controllers
    <!-- create authentication -->
    if(login)?
    if(user)? view(dashboard) : view(admin.index)

    view\admin\index.blade.php
    <!-- create folder and file then copy dashboard code then edit -->

3.  create admin dashbord
    <!-- make controller -->
    php artisan make:controller AdminController

     <!-- create saprate files of each section and include into one -->

         admin.css       \\
         admin.header     \\
         admin.sidebar     || =>> admin.index
         admin.body       //
         admin.js        //

     <!-- set logout button on header -->

4. set default route
    routes\web.php  
     <!-- create  route -->
    Route::get('/', [HomeController::class,'my_home']);

    
    <!-- create folder and file then add code then edit -->
    view\home\index.blade.php

    <!-- create saprate files of each section and include into one -->

         home.css       \\
         home.header     \\
         home.about       \\ 
         home.gallary      \\   =>> home.index
         home.book         //
         home.blog        //
         home.reviews    //
         home.footer    //

    <!-- add logout button in 'home.header'
     if user already login -->
     if(login)?  Logout     :   Login /Register


5. insert data to database from admin panel

    <!-- make table food and edit -->
    php artisan make:model Food -m
    php artisan migrate
    <!-- in sidebar list's set url on add food  -->
    <!-- create new route  -->
    Route::get('/add_food',[AdminController::class,'add_food']);

    <!-- create view\admin\add_food.blade.php file   -->
    create form with fields 'title','details','price','image'
    give url in form action

    <!-- give url ('upload_food') to form and create new route -->
    Route::post('/upload_food',[AdminController::class,'upload_food']);
<!--     
    in upload_food()
        get table 'Food' in $data
        get name of fields add assign value to $data
        redirect back -->


6. Display Data from database
    <!-- in sidebar list's set url on View food  -->
    <!-- create new route  -->
    Route::get('/view_food',[AdminController::class,'view_food']);

    <!-- in view_food()
        get all data of table 'Food' in $data -->
        return view (admin.show_food) with all data

    <!-- create new file view\admin\show_food.blade.php -->
        create table 'title','details','price','image'
        <!-- using foreach loop display data   -->


7.delete data 

    <!-- in table add delete link and set route url -->
        <a  href="{{url('/delete_food',$data->id)}}">Delete</a>

    <!-- create new route -->
    Route::get('/delete_food/{id}',[AdminController::class,'delete_food']);

    <!-- in delete_food($id)  -->
        find id from table 'Food'
        then delete and redirect back


8.Update data 
   
    <!-- in table add Update link and set route url -->
    <a  href="{{url('/update_food',$data->id)}}">Update</a>

    <!-- create new route -->
    Route::get('/update_food/{id}',[AdminController::class,'update_food']);

    <!-- create another file view\update_food.blade.php then copy paste add_food.blade.php -->
    change form url to 'edit_food' and edit

    <!-- create new route -->
    Route::post('/edit_food/{id}',[AdminController::class,'edit_food']);

    in edit_food(Request $request,$id)
        get table 'Food' in $data
        get name of fields add assign value to $data
        redirect view('admin.view_food')

9. display data in home page

    <!-- in home\blog.blade.php 
     put div into foreach loop to show food table info like 'image','price','title','details' -->

    <!-- in HomeController return index.blade.php with table data -->
    $data =Food::all();
    return view('home.index',compact('data'));

10. Add Food to Cart

    <!-- create new table 'cart' -->
    php artisan make:model Cart -m
    <!-- add column name in Card.php and migrations 'create_carts_table' then migrate -->
     php artisan migrate

    <!-- in foreach loop create form with number input and add to card button then give url 'add_cart' -->
    <!-- create new route -->
    Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

    <!-- in add_cart() -->
        if(Auth::id()) ?         //check user id exist or not
            <!-- get table 'Food' in $data
            get name of fields add assign value to $data
            redirect -> back -->
        :
            <!-- redirect -> login -->
    
    <!-- add one more column to cart 'userid' -->
    php artisan make:migration add_userid_field_to_carts
    <!-- add coumns to migration add_userid_field_to_carts.php -->
     php artisan migrate


11. create an my cart link

    <!-- on header if user logged in show Card link and set url 'my_cart' -->
    <!-- create new route -->
    Route::get('/my_cart',[HomeController::class,'my_cart']);
    in my_cart()
         $user_id=Auth::user()->id;          //check user id exist or not
         <!-- match cart->userid     =     Auth->user_id  -->
        $data=Cart::where('userid','=',$user_id)->get();

        <!-- return (home.my_cart) with data -->

    create new file 'mycart.blade.php'

        <!-- add navbar and create new table with column 'Food title','Price','Quantity','Image' -->

12. remove data from cart

       <!-- in table add remove link and set route url -->
        <a  href="{{url('/remove_cart',$data->id)}}">Remove</a>

    <!-- create new route -->
    Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

    <!-- in remove_cart($id)  -->
        find id from table 'Food'
        then delete and redirect back

    <!-- find total price using php openings and closing  -->

13. Move data from one table to another

    <!-- create new table 'cart' -->
    php artisan make:model Order -m
    <!-- add column name in Order.php and migrations 'create_orders_table' then migrate -->
     php artisan migrate

    <!-- create an form in my_cart.blade.php and set url 'confirm_order'  -->

    <!-- create new route -->
    Route::post('/confirm_order',[HomeController::class,'confirm_order']);

    in confirm_order()
        <!-- get user id if user logged in -->
        $user_id = Auth()->user()->id; 
        <!-- match cart->userid     =     Auth->user_id  -->
        $cart = Cart::where('userid','=',$user_id)->get();

        in foreach loop 
        <!-- create new Order
            get order names using request
            get order names using cart
            store in Order then save 

            find cart id and delete -->

 14. show data on Admin panel

    admin\sidebar.blade.php
        <!-- in foreach loop create table and add url 'orders' -->
    <!-- create new route -->
    Route::get('/orders',[AdminController::class,'orders']);

    in orders()
        <!-- get all data from table 'Order' -->
        <!-- return admin.order with data-->
    

15. Change Status of Order for only Admin

    <!-- add three buttons in orders table 'On The Way', 'Delivered', 'Canceled' -->
    <!-- give Unique url to each other  -->
    <!-- create new routes -->
    Route::get('/on_the_way/{id}',[AdminController::class,'on_the_way']);
    Route::get('/Delivered/{id}',[AdminController::class,'Delivered']);
    Route::get('/Canceled/{id}',[AdminController::class,'Canceled']);

    in on_the_way(),Delivered(),Canceled()
        <!-- find order id -->
        <!-- change delivery_status then redirect back -->

16. book a table 

    <!-- create new table 'Book' -->
    php artisan make:model Book -m
    <!-- add column name in Book.php and migrations 'create_books_table' then migrate -->
    php artisan migrate

    <!-- create new form and add url 'book_table' -->
    <!-- create new route -->
    Route::post('/book_table',[HomeController::class,'book_table']);

    in book_table()
        <!-- receive form data using request and add into 'Book' then redirect back -->

17. Count total Rows and show it in the Admin Panel
    in view\admin\sidebar.blade.php
        <!-- set url 'home' to navigation -->

    in view\admin\body.blade.php
        <!-- show 'Total User', 'Total Food','Total Order','Total Deliverd' -->
    go to home route where called index()
        <!-- find total values with condition then return data with admin.index -->
            total_user,       \       give  'usertype'='user'  from User table
            total_food,        \      give  all from Food table
            total_order,       /      give  all from Order table
            total_deliverd    /       give 'delivery_status'='Deliverd' from Order table
