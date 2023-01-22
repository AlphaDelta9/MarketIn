<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopByBenefitController extends Controller
{
    public function index(){
        $clarifying = Product::inRandomOrder()->where('hero','patchouli')->take(6)->get();
        $nourishing = Product::inRandomOrder()->where('hero','ylang')->take(6)->get();
        $revitalizing = Product::inRandomOrder()->where('hero','bergamot')->take(6)->get();
        return view('front.shop.by-benefit.index', compact('clarifying','nourishing','revitalizing'));
    }
    
    public function show($benefit){
        if($benefit == 'clarifying-and-balancing'){
            $hero = 'patchouli';
        }elseif($benefit == 'nourishing-and-soothing'){
            $hero = 'ylang';
        }elseif($benefit == 'revitalizing-and-energizing'){
            $hero = 'bergamot';
        }
        $products = Product::orderBy('id','asc')->where('hero',$hero)->get();
        return view('front.shop.by-benefit.benefit',compact('products','benefit'));
    }
    
}