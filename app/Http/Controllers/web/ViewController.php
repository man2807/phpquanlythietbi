<?php

namespace App\Http\Controllers\web;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thietbi;
use App\Models\Taisan;
use App\Models\Danhmuc;
use App\Models\Muon;
use App\Models\Chitietmuon;
use App\Models\User;

class ViewController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
        }else{
            #$user = Auth::user();
            $supplie = Thietbi::get();
            return view('admin.supplies.index',compact('supplie'));
            //return redirect()->route('admin.login');
        }
    }
}
