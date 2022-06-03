<?php
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MajorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('page.dashboard.index');
});
Route::resource('mahasiswa', MahasiswaController::class);

Route::controller(MajorController::class)->group(function(){
    Route::get('/major','index')->name('major.index');
    Route::get('/major/list','datatable')->name('major.datatable');
    Route::post('/major','store')->name('major.store');
    Route::get('/major/{id?}','show')->name('major.show');
    Route::put('/major/{id}','update')->name('major.update');
    Route::delete('/major/{id}','destroy')->name('major.destroy');
});