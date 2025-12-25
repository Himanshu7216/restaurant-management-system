<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [HomeController::class, 'registerForm']);
Route::post('/register', [HomeController::class, 'register']);
Route::get('/logout', [HomeController::class, 'logout']);


Route::get('/', [HomeController::class,'my_home']);

//login route
Route::get('/home',[HomeController::class,'index']);


Route::get('/add_food',[AdminController::class,'add_food']);
Route::get('/add_juice',[AdminController::class,'add_juice']);

Route::post('/upload_food',[AdminController::class,'upload_food']);
Route::post('/upload_juice',[AdminController::class,'upload_juice']);

Route::get('/view_food',[AdminController::class,'view_food']);
Route::get('/view_Juice',[AdminController::class,'view_Juice']);


Route::get('/delete_food/{id}',[AdminController::class,'delete_food']);
Route::get('/delete_juice/{id}',[AdminController::class,'delete_juice']);

Route::get('/update_food/{id}',[AdminController::class,'update_food']);
Route::get('/update_juice/{id}',[AdminController::class,'update_juice']);


Route::post('/edit_food/{id}',[AdminController::class,'edit_food']);
Route::post('/edit_juice/{id}',[AdminController::class,'edit_juice']);

Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/my_cart',[HomeController::class,'my_cart']);
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

Route::post('/confirm_order',[HomeController::class,'confirm_order']);

Route::get('/orders',[AdminController::class,'orders']);

// button routes
Route::get('/on_the_way/{id}',[AdminController::class,'on_the_way']);
Route::get('/Delivered/{id}',[AdminController::class,'Delivered']);
Route::get('/Canceled/{id}',[AdminController::class,'Canceled']);

//book table
Route::post('/book_table',[HomeController::class,'book_table']);
//reservation 
Route::get('/reservation',[AdminController::class,'reservation']);
//tables
Route::get('/tables',[AdminController::class,'tables']);
//charts
Route::get('/charts',[AdminController::class,'charts']);

Route::get('/table/foods/{id}', [AdminController::class,'table_foods']);
Route::get('/table/drinks/{id}', [AdminController::class,'table_drinks']);



//middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
