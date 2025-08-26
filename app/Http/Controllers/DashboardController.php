<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers    = User::count();
        $totalProducts = Product::count();
        $latestProducts = Product::latest()->take(5)->get();

        return view('dashboard', compact('totalUsers', 'totalProducts', 'latestProducts'));
    }
}