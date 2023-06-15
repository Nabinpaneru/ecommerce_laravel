<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\AllcategoryController;
use App\Http\Controllers\BrandController;


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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/allcategory', [ AllcategoryController::class, 'index'])->name('allcategory')->middleware('auth');

Route::post('/store', [ AllcategoryController::class, 'store'])->name('store');

Route::get('/edit/{id}', [ AllcategoryController::class, 'edit'])->name('edit');

Route::post('/update/{id}', [ AllcategoryController::class, 'update'])->name('update');


Route::get('/delete/{id}', [ AllcategoryController::class, 'delete'])->name('delete');


/* brand  */


Route::get('/allbrand', [BrandController::class, 'brand'])->name('allbrand');

Route::post('/brand/store', [BrandController::class, 'brandstore'])->name('brand.store');
Route::get('/brand/{id}/edit/', [BrandController::class, 'brandedit'])->name('brand.edit');
Route::get('/brand/{id}/delete/', [BrandController::class, 'branddelete'])->name('brand.delete');
Route::post('/brand/{id}/update', [BrandController::class, 'brandupdate'])->name('brand.update');


/* Multi Images */
Route::get('/multiimages',[BrandController::class, 'multiimages'])->name('multi.image');
Route::post('/multiimages/stores',[BrandController::class, 'multistore'])->name('image.store');




Route::get('/dashboard', function () {

     $users= User::all();

    return view('dashboard',['users'=>$users]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
