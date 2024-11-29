<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

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

Auth::routes();

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // Main dashboard route
    
    // Sales Reports Routes
    Route::get('/dashboard/sales', [DashboardController::class, 'salesReport'])->name('dashboard.sales'); // Sales overview
    
    // Line chart route for sales comparison
    Route::get('/dashboard/sales-comparison', [DashboardController::class, 'salesComparison'])->name('dashboard.sales.comparison');
    
    // New orders / unprocessed orders list
    Route::get('/dashboard/new-orders', [DashboardController::class, 'newOrders'])->name('dashboard.new_orders');
    
    // Top 10 selling products (last 2 years)
    Route::get('/dashboard/top-selling-products', [DashboardController::class, 'topSellingProducts'])->name('dashboard.top_selling_products');
    
    // Users with the highest number of orders
    Route::get('/dashboard/top-users', [DashboardController::class, 'topUsers'])->name('dashboard.top_users');
    
    // New user registrations by month and year
    Route::get('/dashboard/new-users', [DashboardController::class, 'newUsers'])->name('dashboard.new_users');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
