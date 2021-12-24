<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class Addproduct extends Controller
{
    public function create(){
        return view('addproduct.create');    
    }
    public function store(Request $req){
      $products= new Product();
      $products->productname= $req->productname;
      $products->productprice= $req->productprice;
      $products->category = $req->category;
      $products->save();
      return redirect('/');
    }
}
