<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('annonces', AnnonceController::class);

Route::get('/', [AnnonceController::class, 'index']);
// Route::get('/', function () {
//     return view('welcome');
// });
