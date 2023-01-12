<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopByCategoryController extends Controller
{
    public function index(){
        $hair_care = Product::orderBy("id")->where('tags','like','%hair-care%')->take(16)->get();
        $body_care = Product::orderBy("id")->where('tags','like','%body-care%')->take(16)->get();
        $home_hygiene = Product::orderBy("id")->where('tags','like','%home-and-hygiene-care%')->take(16)->get();
        $travel_kit = Product::orderBy("id")->where('tags','like','%travel-kits-and-gift-sets%')->take(16)->get();
        return view('front.shop.by-category.index', compact('hair_care','body_care','home_hygiene','travel_kit'));
    }
    
    public function show($category){
        $products = Product::orderBy('id','asc')->where('tags','like','%'.$category.'%')->get();
        return view('front.shop.by-category.category',compact('products','category'));
    }
    
}