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
    Route::post('creat-product', [\App\Http\Controllers\ProductController::class, 'submitCreate'])->name('submitCreate-product');
    Route::get('edit-product/{id}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('edit-product');
    Route::get('createChild-product/{parent_id}', [\App\Http\Controllers\ProductController::class, 'createChild'])->name('create-child-product');
    Route::post('createChild-product', [\App\Http\Controllers\ProductController::class, 'submitCreateChild'])->name('submitCreate-child-product');
    Route::post('edit-product', [\App\Http\Controllers\ProductController::class, 'submitEdit'])->name('submitEdit-product');
    Route::get('view-product', [\App\Http\Controllers\ProductController::class, 'view'])->name('view-product');
    Route::delete('delete-product/{id}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('delete-product');

    Route::get('view-product-image', [\App\Http\Controllers\ImgProductController::class, 'view'])->name('view-product-image');
    Route::get('upload-product-image', [\App\Http\Controllers\ImgProductController::class, 'upLoadImage'])->name('upload-product-image');
    Route::post('upload-product-image', [\App\Http\Controllers\ImgProductController::class, 'summitUpload'])->name('summitUploadProduct-image');
    Route::get('edit-product-image/{id}', [\App\Http\Controllers\ImgProductController::class, 'edit'])->name('edit-product-image');
    Route::post('edit-product-image/{id}', [\App\Http\Controllers\ImgProductController::class, 'submitEdit'])->name('edit-product-image');
    Route::delete('delete-product-image/{id}', [\App\Http\Controllers\ImgProductController::class, 'delete'])->name('delete-product-image');


    //manager product attribute
    Route::get('create-ram', [\App\Http\Controllers\RamController::class, 'create'])->name('create-ram');
    Route::post('create-ram', [\App\Http\Controllers\RamController::class, 'submitCreate'])->name('submitCreate-ram');
    Route::get('view-ram', [\App\Http\Controllers\RamController::class, 'view'])->name('view-ram');
    Route::get('edit-ram/{id}', [\App\Http\Controllers\RamController::class, 'edit'])->name('edit-ram');
    Route::post('edit-ram', [\App\Http\Controllers\RamController::class, 'submitEdit'])->name('submitEdit-ram');
    Route::delete('delete-ram/{id}', [\App\Http\Controllers\RamController::class, 'delete'])->name('delete-ram');

    Route::get('create-brand', [\App\Http\Controllers\BrandController::class, 'create'])->name('create-brand');
    Route::post('create-brand', [\App\Http\Controllers\BrandController::class, 'submitCreate'])->name('submitCreate-brand');
    Route::get('view-brand', [\App\Http\Controllers\BrandController::class, 'view'])->name('view-brand');
    Route::get('edit-brand/{id}', [\App\Http\Controllers\BrandController::class, 'edit'])->name('edit-brand');
    Route::post('edit-brand', [\App\Http\Controllers\BrandController::class, 'submitEdit'])->name('submitEdit-brand');
    Route::delete('delete-brand/{id}', [\App\Http\Controllers\BrandController::class, 'delete'])->name('delete-brand');

    Route::get('create-cam_after', [\App\Http\Controllers\CamAfterController::class, 'create'])->name('create-cam_after');
    Route::post('create-cam_after', [\App\Http\Controllers\CamAfterController::class, 'submitCreate'])->name('submitCreate-cam_after');
    Route::get('view-cam_after', [\App\Http\Controllers\CamAfterController::class, 'view'])->name('view-cam_after');
    Route::get('edit-cam_after/{id}', [\App\Http\Controllers\CamAfterController::class, 'edit'])->name('edit-cam_after');
    Route::post('edit-cam_after', [\App\Http\Controllers\CamAfterController::class, 'submitEdit'])->name('submitEdit-cam_after');
    Route::delete('delete-cam_after/{id}', [\App\Http\Controllers\CamAfterController::class, 'delete'])->name('delete-cam_after');

    Route::get('create-cam_before', [\App\Http\Controllers\CamBeforeController::class, 'create'])->name('create-cam_before');
    Route::post('create-cam_before', [\App\Http\Controllers\CamBeforeController::class, 'submitCreate'])->name('submitCreate-cam_before');
    Route::get('view-cam_before', [\App\Http\Controllers\CamBeforeController::class, 'view'])->name('view-cam_before');
    Route::get('edit-cam_before/{id}', [\App\Http\Controllers\CamBeforeController::class, 'edit'])->name('edit-cam_before');
    Route::post('edit-cam_before', [\App\Http\Controllers\CamBeforeController::class, 'submitEdit'])->name('submitEdit-cam_before');
    Route::delete('delete-cam_before/{id}', [\App\Http\Controllers\CamBeforeController::class, 'delete'])->name('delete-cam_before');

    Route::get('create-category', [\App\Http\Controllers\CategoryController::class, 'create'])->name('create-category');
    Route::post('create-category', [\App\Http\Controllers\CategoryController::class, 'submitCreate'])->name('submitCreate-category');
    Route::get('view-category', [\App\Http\Controllers\CategoryController::class, 'view'])->name('view-category');
    Route::get('edit-category/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('edit-category');
    Route::post('edit-category', [\App\Http\Controllers\CategoryController::class, 'submitEdit'])->name('submitEdit-category');
    Route::delete('delete-category/{id}', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('delete-category');


    Route::get('create-cpu', [\App\Http\Controllers\CpuController::class, 'create'])->name('create-cpu');
    Route::post('create-cpu', [\App\Http\Controllers\CpuController::class, 'submitCreate'])->name('submitCreate-cpu');
    Route::get('view-cpu', [\App\Http\Controllers\CpuController::class, 'view'])->name('view-cpu');
    Route::get('edit-cpu/{id}', [\App\Http\Controllers\CpuController::class, 'edit'])->name('edit-cpu');
    Route::post('edit-cpu', [\App\Http\Controllers\CpuController::class, 'submitEdit'])->name('submitEdit-cpu');
    Route::delete('delete-cpu/{id}', [\App\Http\Controllers\CpuController::class, 'delete'])->name('delete-cpu');

    Route::get('create-display', [\App\Http\Controllers\DisplayController::class, 'create'])->name('create-display');
    Route::post('create-display', [\App\Http\Controllers\DisplayController::class, 'submitCreate'])->name('submitCreate-display');
    Route::get('view-display', [\App\Http\Controllers\DisplayController::class, 'view'])->name('view-display');
    Route::get('edit-display/{id}', [\App\Http\Controllers\DisplayController::class, 'edit'])->name('edit-display');
    Route::post('edit-display', [\App\Http\Controllers\DisplayController::class, 'submitEdit'])->name('submitEdit-display');
    Route::delete('delete-display/{id}', [\App\Http\Controllers\DisplayController::class, 'delete'])->name('delete-display');

    Route::get('create-memory', [\App\Http\Controllers\MemoryController::class, 'create'])->name('create-memory');
    Route::post('create-memory', [\App\Http\Controllers\MemoryController::class, 'submitCreate'])->name('submitCreate-memory');
    Route::get('view-memory', [\App\Http\Controllers\MemoryController::class, 'view'])->name('view-memory');
    Route::get('edit-memory/{id}', [\App\Http\Controllers\MemoryController::class, 'edit'])->name('edit-memory');
    Route::post('edit-memory', [\App\Http\Controllers\MemoryController::class, 'submitEdit'])->name('submitEdit-memory');
    Route::delete('delete-memory/{id}', [\App\Http\Controllers\MemoryController::class, 'delete'])->name('delete-memory');

    Route::get('create-opera', [\App\Http\Controllers\OperaController::class, 'create'])->name('create-opera');
    Route::post('create-opera', [\App\Http\Controllers\OperaController::class, 'submitCreate'])->name('submitCreate-opera');
    Route::get('view-opera', [\App\Http\Controllers\OperaController::class, 'view'])->name('view-opera');
    Route::get('edit-opera/{id}', [\App\Http\Controllers\OperaController::class, 'edit'])->name('edit-opera');
    Route::post('edit-opera', [\App\Http\Controllers\OperaController::class, 'submitEdit'])->name('submitEdit-opera');
    Route::delete('delete-opera/{id}', [\App\Http\Controllers\OperaController::class, 'delete'])->name('delete-opera');


    Route::get('create-pin', [\App\Http\Controllers\PinController::class, 'create'])->name('create-pin');
    Route::post('create-pin', [\App\Http\Controllers\PinController::class, 'submitCreate'])->name('submitCreate-pin');
    Route::get('view-pin', [\App\Http\Controllers\PinController::class, 'view'])->name('view-pin');
    Route::get('edit-pin/{id}', [\App\Http\Controllers\PinController::class, 'edit'])->name('edit-pin');
    Route::post('edit-pin', [\App\Http\Controllers\PinController::class, 'submitEdit'])->name('submitEdit-pin');
    Route::delete('delete-pin/{id}', [\App\Http\Controllers\PinController::class, 'delete'])->name('delete-pin');

    Route::get('create-sim', [\App\Http\Controllers\SimController::class, 'create'])->name('create-sim');
    Route::post('create-sim', [\App\Http\Controllers\SimController::class, 'submitCreate'])->name('submitCreate-sim');
    Route::get('view-sim', [\App\Http\Controllers\SimController::class, 'view'])->name('view-sim');
    Route::get('edit-sim/{id}', [\App\Http\Controllers\SimController::class, 'edit'])->name('edit-sim');
    Route::post('edit-sim', [\App\Http\Controllers\SimController::class, 'submitEdit'])->name('submitEdit-sim');
    Route::delete('delete-sim/{id}', [\App\Http\Controllers\SimController::class, 'delete'])->name('delete-sim');

//    Route::get('create-opera', [\App\Http\Controllers\CpuController::class, 'create'])->name('create-opera');
//    Route::post('create-opera', [\App\Http\Controllers\CpuController::class, 'submitCreate'])->name('submitCreate-opera');
//    Route::get('view-brand', [\App\Http\Controllers\BrandController::class, 'view'])->name('view-brand');
//    Route::get('edit-brand/{id}', [\App\Http\Controllers\BrandController::class, 'edit'])->name('edit-brand');
//    Route::post('edit-brand', [\App\Http\Controllers\BrandController::class, 'submitEdit'])->name('submitEdit-brand');
//    Route::delete('delete-brand/{id}', [\App\Http\Controllers\BrandController::class, 'delete'])->name('delete-brand');
});

