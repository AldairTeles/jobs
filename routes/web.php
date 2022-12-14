<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
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

Route::resource('companies', CompanyController::class)->except(['show']);

// Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');

// Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');

// Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');

// Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');

// Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');

// Route::delete('/companies/{company}',[CompanyController::class, 'destroy'])->name('companies.destroy');

Route::resource('users', UserController::class)->except(['show']);

Route::get('/jobs/{job}/users/{user}', [JobController::class, 'apply'])->name('jobs.apply');
Route::resource('jobs', JobController::class);

