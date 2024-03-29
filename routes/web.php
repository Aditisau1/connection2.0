<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chatcontroller;
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
Route::controller(Chatcontroller::class)->group(function(){
    Route::get('' , 'chatView')->name('chat_view');
    Route::post('/test' , 'testingEvents')->name('event');
    

});