<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function start(Request $request){
        if($request->quiz === '0'){
            $template = view('front.quiz.q-1')->render();
            return response()->json([
                'html' => $template
            ],200);
        }elseif($request->quiz === '1'){
            $template = view('front.quiz.q-2')->render();
            return response()->json([
                'html' => $template
            ],200);
        }elseif($request->quiz === '2'){
            $template = view('front.quiz.q-3')->render();
            return response()->json([
                'html' => $template
            ],200);
        }elseif($request->quiz === '3'){
            $template = view('front.quiz.q-4')->render();
            return response()->json([
                'html' => $template
            ],200);
        }elseif($request->quiz === '4'){
            $template = view('front.quiz.q-5')->render();
            return response()->json([
                'html' => $template
            ],200);
        }elseif($request->quiz === '5' && count( explode(',',$request->selected)) == 5 ){
            $selected_array = explode(',',$request->selected);

            $group_selected = max(array_count_values($selected_array));
            $most_selected = array_search($group_selected, array_count_values($selected_array));
            if($most_selected == 'a'){
                $category = 'bergamot';
            }elseif($most_selected == 'b'){
                $category = 'patchouli';
            }elseif($most_selected == 'c'){
                $category = 'ylang';
            }elseif($most_selected == 'd'){
                $category = 'vetiver';
            }
            $related_products = Product::inRandomOrder()->where('tags','like','%'.$category.'%')->take(6)->get();
            $template = view('front.quiz.selected.'.$most_selected, compact('related_products'))->render();
            return response()->json([
                'html' => $template
            ],200);
                
        }   
    }
}
