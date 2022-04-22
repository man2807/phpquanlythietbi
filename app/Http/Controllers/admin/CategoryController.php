<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use Exception;

class CategoryController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            $category = category::get();
            return view('admin.category.index',compact('category','user'));
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function insert(Request $request){
        $data = $request -> input();
        try{$category = new category();
            $category->name = $data["category"];
            $category->save();
            return redirect('category')->with('success',"Thêm thành công !");
        }catch(Exception $ex){
            return redirect('category')->with('failed',"Thêm thất bại !");
            }
    }
    public function delete($id){
        try{ 
            $category =  category::find($id); 
            if($category != null){
                $category->delete();
                return "success";
            }else{
                return "noid";
            }
        }catch(Exception $ex){
            return "false";
            }
    }
}
