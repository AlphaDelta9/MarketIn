<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $products = Product::orderBy('id','asc')->get();
        return view('front.shop.all.index', compact('products'));
    }
    
    public function show($slug){
        $product = Product::whereSlug($slug)->first();
        $category = explode(',',$product->tags)[0];
        $related_products = Product::inRandomOrder()->where('tags','like','%'.$category.'%')->take(6)->get();
        $match = Product::inRandomOrder()->where('hero',$product->hero)->take(2)->get();
        return view('front.shop.show',compact('product','related_products','match'));
    }
    
}