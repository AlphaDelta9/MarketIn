<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopByHeroController extends Controller
{
    public function index(){
        $bergamot = Product::inRandomOrder()->where('hero','bergamot')->take(6)->get();
        $patchouli = Product::inRandomOrder()->where('hero','patchouli')->take(6)->get();
        $ylang = Product::inRandomOrder()->where('hero','ylang')->take(6)->get();
        return view('front.shop.by-hero.index', compact('bergamot','patchouli','ylang'));
    }
    
    public function show($hero){
        $products = Product::orderBy('id','asc')->where('hero',$hero)->get();
        return view('front.shop.by-hero.hero',compact('products','hero'));
    }
    
}