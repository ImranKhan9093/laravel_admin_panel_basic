<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function(){

   Route::middleware(['admin','auth'])->group(function(){
        Route::get('/dashboard',function(){
            return view('admin.dashboard');
        })->name('dashboard');

   Route::get('/registeredRoles',[DashboardController::class,'registeredRoles'])->name('registeredRoles');

   Route::get('/editRoles/{user}',[DashboardController::class,'editRoles'])->name('editRoles');
   
   Route::put('/updateRole/{user}',[DashboardController::class,'updateRole'])->name('updateRole');
   Route::delete('/deleteUser/{user}',[DashboardController::class,'deleteUser'])->name('deleteUser');

    Route::resource('/aboutus',AboutUsController::class);

   });
   
});

require __DIR__.'/auth.php';
