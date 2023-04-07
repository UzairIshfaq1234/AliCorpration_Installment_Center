<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\installment;
use App\Http\Controllers\Api\ApiController;
 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/userdata', function () {

//     // return response()->json("API ");
//     return installment::all();

// });

// Route::post('/userdata',function(){

//     return response()->json("API HITTED");
// })->name('user.add');

// Route::delete('/userdata/{id}',function($id){

//     return response("Data delete is".$id,200);
// })->name('user.delete');


// Route::put('/userdata/{id}',function($id){

//     return response("Data updated is".$id,200);
// })->name('user.put');


Route::get('/userdata', function () {

    p("my naem is ");

});

Route::post('/Installment/Store', [ApiController::class, 'store'])->name('view.installment.store');

Route::get('/Installment/{flag}', [ApiController::class, 'index'])->name('view.installment.get');

Route::delete('/Installment/delete/{id}',[ApiController::class,'destroy'])->name('view.installment.delete');

Route::put('/Installment/update/{id}',[ApiController::class,'update'])->name('view.installment.update');

Route::patch('/post/{id}',[ApiController::class,'updateposts'])->name('view.updateposts.update');

Route::put('/postdata/{id}',[ApiController::class,'updatepostsput'])->name('view.updatepostsput.update');

Route::get('/Installment', [ApiController::class, 'installmentdata'])->name('view.installmentdata.get');
