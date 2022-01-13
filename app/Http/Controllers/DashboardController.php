<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function count(){
        $productCount = Product::all()->count();   
        $userCount = User::all()->count();   
        return view('dashboard',compact('productCount','userCount'));
    }
}
