<?php

use App\Http\Controllers\appointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', function () {
//     return view('home');
// });


// Route::get('/about', function () {
//     return view('about');
// });

// call view from controller function
// Route::get("/home", [HomeController::class, "index"]);

// Route::get("/about", [HomeController::class, "about"]);


//get value from path

// Route::get("/user/id/{name}", function ($name) {
//     return "Welcome $name";
// });

//control 7 classes in PatientController with 1 route 
//know total 7functuions  in PatientController because of Route::resource
Route::resource("/patient", PatientController::class);

Route::resource("/room", RoomController::class);

Route::resource("/drug", DrugController::class);

Route::resource("/msg", MessageController::class);

Route::resource("/appt", appointmentController::class);

// Route::resource("/maindash", DashboardController::class);


//calling specific middleware 
// Route::get("/maindash", [DashboardController::class, "index"])->middleware("greet");

Route::get("/maindash", [DashboardController::class, "index"]);

Route::get("/login", [LoginController::class, "login"]);
Route::post("/login", [LoginController::class, "loginChecker"]);
Route::get("/logout", [LoginController::class, "logout"]);


//language change

Route::get("/lang/{code}", [DashboardController::class, "locale"]);
