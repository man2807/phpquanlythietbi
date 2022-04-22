<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\supplie;

class ViewController extends Controller
{
    //
    public function index(){
        $supplie1 = supplie::where('status', 1)->where('category','=','2')->limit(20)->get();
        $supplie2 = supplie::where('status', 1)->where('category','=','5')->limit(20)->get();
        $supplie3 = supplie::where('status', 1)->where('category','=','4')->limit(20)->get();
        return view('web.home.index',compact('supplie1','supplie2','supplie3'));
    }
}
