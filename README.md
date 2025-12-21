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
        then delete and redirect


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

