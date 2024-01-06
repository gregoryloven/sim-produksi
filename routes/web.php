<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductionController;

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

Route::resource('category', CategoryController::class);
Route::post('/category/EditForm', [CategoryController::class, 'EditForm'])->name('category.EditForm');

Route::resource('material', MaterialController::class);
Route::post('/material/EditForm', [MaterialController::class, 'EditForm'])->name('material.EditForm');

Route::resource('product', ProductController::class);
Route::post('/product/EditForm', [ProductController::class, 'EditForm'])->name('product.EditForm');

Route::resource('employee', EmployeeController::class);
Route::post('/employee/EditForm', [EmployeeController::class, 'EditForm'])->name('employee.EditForm');

Route::resource('production', ProductionController::class);
Route::post('/production/EditForm', [ProductionController::class, 'EditForm'])->name('production.EditForm');
