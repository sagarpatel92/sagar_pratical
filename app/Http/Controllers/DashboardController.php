<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
     // Main dashboard view
     public function index()
     {
         return view('dashboard.index');
     }
 
     // Sales Report: Current, Previous Month, Year-to-Date Sales, etc.
     public function salesReport()
     {
         // Get current month sales
         $currentMonthSales = Order::whereBetween('created_at', [
             Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()
         ])->sum('total_amount');
 
         // Get previous month sales
         $previousMonthSales = Order::whereBetween('created_at', [
             Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()
         ])->sum('total_amount');
 
         // Get current year's sales
         $currentYearSales = Order::whereBetween('created_at', [
             Carbon::now()->startOfYear(), Carbon::now()->endOfYear()
         ])->sum('total_amount');
 
         // Get previous year's sales
         $previousYearSales = Order::whereBetween('created_at', [
             Carbon::now()->subYear()->startOfYear(), Carbon::now()->subYear()->endOfYear()
         ])->sum('total_amount');
 
         return view('dashboard.sales', compact(
             'currentMonthSales', 'previousMonthSales', 'currentYearSales', 'previousYearSales'
         ));
     }
 
     // Line chart route for sales comparison (Current Year vs Previous Year)
     public function salesComparison()
     {
         // Get sales per month for the current year
         $currentYearSales = Order::whereYear('created_at', Carbon::now()->year)
             ->select(DB::raw('MONTH(created_at) as month'), DB::raw('sum(total_amount) as sales'))
             ->groupBy(DB::raw('MONTH(created_at)'))
             ->pluck('sales', 'month');
 
         // Get sales per month for the previous year
         $previousYearSales = Order::whereYear('created_at', Carbon::now()->subYear()->year)
             ->select(DB::raw('MONTH(created_at) as month'), DB::raw('sum(total_amount) as sales'))
             ->groupBy(DB::raw('MONTH(created_at)'))
             ->pluck('sales', 'month');
 
         return view('dashboard.sales_comparison', compact('currentYearSales', 'previousYearSales'));
     }
 
     // New/unprocessed orders with customer details
     public function newOrders()
     {
         $newOrders = Order::where('status', 'pending')
             ->with('customer') // Eager load customer details
             ->latest()
             ->take(10) // Limit to 10 most recent orders
             ->get();
 
         return view('dashboard.new_orders', compact('newOrders'));
     }
 
     // Last 2 years top 10 selling products
     public function topSellingProducts()
     {
         $topSellingProducts = Order::whereBetween('created_at', [
                 Carbon::now()->subYears(2)->startOfYear(), Carbon::now()->endOfYear()
             ])
             ->join('order_items', 'orders.id', '=', 'order_items.order_id')
             ->join('products', 'order_items.product_id', '=', 'products.id')
             ->select('products.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
             ->groupBy('products.name')
             ->orderByDesc('total_quantity')
             ->take(10)
             ->get();
 
         return view('dashboard.top_selling_products', compact('topSellingProducts'));
     }
 
     // Users with the highest number of orders
     public function topUsers()
     {
         $topUsers = Customer::withCount('orders')
             ->orderByDesc('orders_count')
             ->take(10)
             ->get()
             ->map(function ($customer) {
                 $customer->total_spent = $customer->orders->sum('total_amount');
                 return $customer;
             });
 
         return view('dashboard.top_users', compact('topUsers'));
     }
 
     // New user registrations by month
     public function newUsers()
     {
         $newUsersByMonth = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as user_count'))
             ->groupBy(DB::raw('MONTH(created_at)'))
             ->pluck('user_count', 'month');
 
         $newUsersByYear = User::select(DB::raw('YEAR(created_at) as year'), DB::raw('count(*) as user_count'))
             ->groupBy(DB::raw('YEAR(created_at)'))
             ->pluck('user_count', 'year');
 
         return view('dashboard.new_users', compact('newUsersByMonth', 'newUsersByYear'));
     }
}
