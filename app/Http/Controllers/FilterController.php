<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FilterController extends Controller
{
    //

    public function filter ($id){

        if($id !='all' && $id !='top' && $id != 'regular' && $id != 'snack' && $id != 'bread' && $id != 'mobile' && $id != 'laptop' && $id != 'tablet' && $id != 'accessories' && $id != 'gaming' && $id != 'camera' && $id != 'tv' && $id !='whiskey' && $id != 'wine' && $id != 'water' && $id != 'vodka' && $id != 'soft' && $id != 'energy' && $id != 'champagne' && $id != 'beer' && $id != 'beef' && $id != 'chicken' && $id != 'fish' && $id != 'fruits' && $id != 'vegetables' )
        {
            return view('errors.404');
        }else{

            if($id === 'all'){
                $count = count(DB::table('stores')->get());
                $pageItem = ceil($count/2);
                $found =  DB::table('stores')->orderBy('product')->paginate(12);
                $title = "All Category";
                return view('Pages.filter',['found' => $found, 'pages'=>$pageItem, 'title'=>$title]);

            }else if($id === 'top'){
                $count = count(DB::table('stores')->where('sold', '>=' , 50)->get());
                $pageItem = ceil($count/2);
                $found =  DB::table('stores')->where('sold', '>=' , 50)->paginate(12);
                $title = "Top Product";
                return view('Pages.filter',['found' => $found, 'pages'=>$pageItem, 'title'=>$title]);
            
            }else if($id === 'beef'){
                $count = count(DB::table('stores')->where('category', '=' , 'MeatFish')
                ->where('type', '=', NULL)->get());
                $pageItem = ceil($count/2);
                $found =  DB::table('stores')->where('category', '=' , 'MeatFish')
                ->where('type', '=', NULL)->paginate(12);
                $title = "Beef Meat";
                return view('Pages.filter',['found' => $found, 'pages'=>$pageItem,'title'=>$title]);

            }else if($id === 'regular'){
                    $count = count(DB::table('stores')->where('category', '=' , 'Foods')
                    ->where('type', '=', NULL)->get());
                    $pageItem = ceil($count/2);
                    $found =  DB::table('stores')->where('category', '=' , 'Foods')
                    ->where('type', '=', NULL)->paginate(12);
                    $title = "Regular Foods";
                    return view('Pages.filter',['found' => $found, 'pages'=>$pageItem,'title'=>$title]);
            }else{
                $count = count(DB::table('stores')->where('type', '=', "$id")->get());
                $pageItem = ceil($count/2);
                $found =  DB::table('stores')->where('type', '=' , "$id")->paginate(12);
                $title = ucfirst($id);
                return view('Pages.filter',['found' => $found, 'pages'=>$pageItem,'title'=>$title]);   
            }
        }
    }
}
