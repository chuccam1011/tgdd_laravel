<?php

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

Route::group(['prefix' => 'admin'], function () {
    Route::get('create', function () {
        return view('admin.product.create');
    });
    Route::get('', function () {
        return view('admin.index');
    });
    Route::get('login', [\App\Http\Controllers\AuthAdmin::class, 'getFormLogin'])->name('admin-login');
    Route::post('login', [\App\Http\Controllers\AuthAdmin::class, 'submitFromLogin'])->name('admin-login-submit');

    Route::get('register', [\App\Http\Controllers\AuthAdmin::class, 'getFormRegister'])->name('admin-register');
    Route::post('register', [\App\Http\Controllers\AuthAdmin::class, 'submitFromRegister'])->name('submit-register-admin');
    Route::get('dashboard', [\App\Http\Controllers\Dashboard::class, 'index'])->name('dashboard');

    Route::get('creat-product', [\App\Http\Controllers\ProductController::class, 'create'])->name('create-product');
    Route::post('creat-product', [\App\Http\Controllers\ProductController::class, 'submitCreateProduct'])->name('submitCreate-product');
    Route::get('edit-product', [\App\Http\Controllers\ProductController::class, 'editProduct'])->name('edit-product');
    Route::post('edit-product', [\App\Http\Controllers\ProductController::class, 'submitEditProduct'])->name('submitEditProduct-product');
    Route::get('view-product', [\App\Http\Controllers\ProductController::class, 'view'])->name('view-product');
    Route::post('delete-product', [\App\Http\Controllers\ProductController::class, 'delete'])->name('delete-product');

    //manager product attribute
    Route::get('create-ram', [\App\Http\Controllers\RamController::class, 'create'])->name('create-ram');
    Route::post('create-ram', [\App\Http\Controllers\RamController::class, 'submitCreate'])->name('submitCreate-ram');
    Route::get('view-ram', [\App\Http\Controllers\RamController::class, 'view'])->name('view-ram');
    Route::get('edit-ram', [\App\Http\Controllers\RamController::class, 'edit'])->name('edit-ram');
    Route::post('edit-ram', [\App\Http\Controllers\RamController::class, 'submitEdit'])->name('submitEdit-ram');
    Route::post('delete-ram', [\App\Http\Controllers\RamController::class, 'delete'])->name('delete-ram');

    Route::get('create-brand', [\App\Http\Controllers\BrandController::class, 'create'])->name('create-brand');
    Route::post('create-brand', [\App\Http\Controllers\BrandController::class, 'submitCreate'])->name('submitCreate-brand');
    Route::get('view-brand', [\App\Http\Controllers\BrandController::class, 'view'])->name('view-brand');
    Route::get('edit-brand/{id}', [\App\Http\Controllers\BrandController::class, 'edit'])->name('edit-brand');
    Route::post('edit-brand', [\App\Http\Controllers\BrandController::class, 'submitEdit'])->name('submitEdit-brand');
    Route::delete('delete-brand/{id}', [\App\Http\Controllers\BrandController::class, 'delete'])->name('delete-brand');

    Route::get('create-cam_afters', [\App\Http\Controllers\CamAfterController::class, 'create'])->name('create-cam_afters');
    Route::post('create-cam_afters', [\App\Http\Controllers\CamAfterController::class, 'submitCreate'])->name('submitCreate-cam_afters');

    Route::get('create-cam_afters-before', [\App\Http\Controllers\CamBeforeController::class, 'create'])->name('create-cam_afters-before');
    Route::post('create-cam_afters-before', [\App\Http\Controllers\CamBeforeController::class, 'submitCreate'])->name('submitCreate-cam_afters-before');

    Route::get('create-category', [\App\Http\Controllers\CategoryController::class, 'create'])->name('create-category');
    Route::post('create-category', [\App\Http\Controllers\CategoryController::class, 'submitCreate'])->name('submitCreate-category');

    Route::get('create-cpu', [\App\Http\Controllers\CpuController::class, 'create'])->name('create-cpu');
    Route::post('create-cpu', [\App\Http\Controllers\CpuController::class, 'submitCreate'])->name('submitCreate-cpu');


    Route::get('create-display', [\App\Http\Controllers\DisplayController::class, 'create'])->name('create-display');
    Route::post('create-display', [\App\Http\Controllers\DisplayController::class, 'submitCreate'])->name('submitCreate-display');


    Route::get('create-memory', [\App\Http\Controllers\MemoryController::class, 'create'])->name('create-memory');
    Route::post('create-memory', [\App\Http\Controllers\MemoryController::class, 'submitCreate'])->name('submitCreate-memory');


    Route::get('create-opera', [\App\Http\Controllers\CpuController::class, 'create'])->name('create-opera');
    Route::post('create-opera', [\App\Http\Controllers\CpuController::class, 'submitCreate'])->name('submitCreate-opera');



    Route::get('create-pin', [\App\Http\Controllers\PinController::class, 'create'])->name('create-pin');
    Route::post('create-pin', [\App\Http\Controllers\PinController::class, 'submitCreate'])->name('submitCreate-pin');


    Route::get('create-sim', [\App\Http\Controllers\SimController::class, 'create'])->name('create-sim');
    Route::post('create-sim', [\App\Http\Controllers\SimController::class, 'submitCreate'])->name('submitCreate-sim');


    Route::get('create-opera', [\App\Http\Controllers\CpuController::class, 'create'])->name('create-opera');
    Route::post('create-opera', [\App\Http\Controllers\CpuController::class, 'submitCreate'])->name('submitCreate-opera');

});

