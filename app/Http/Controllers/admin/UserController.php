<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\supplie;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            $supplie = supplie::where('status','=','1')->get();
            return view('admin.member.index',compact('supplie','user'));
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function insert(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $data = $request->input();
            try{
                $newMember = new User;
                $newMember->name = $data["name_ct"];
                $newMember->username = $data["username"];
                $newMember->phone = $data["phone"];
                $newMember->password = bcrypt('123456');
                $newMember->role = 3;
                $newMember->save();
                return redirect('member')->with('success',"Thêm thành công tài khoản là: ".$data["username"]." pass: 123456");
            }catch(Exception $ex){
                return redirect('member')->with('failed',"Thêm thất bại");
            }
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function changepass(){
        if(Auth::check()){
            $user = Auth::user();
            return view('admin.member.changepass',compact('user'));
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function sendNewPass(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $data = $request->input();
            $member = User::find($user["id"]);
            if (Hash::check($data["oldpass"], $user["password"])) {
                $member->password = bcrypt($data["newpass"]);
                $member->role = 2;
                $member->save();
                return redirect('member/newpass')->with('success',"Thay đổi mật khẩu thành công");
            }        
            else{
                return redirect('member/newpass')->with('failed',"Thay đổi mật khẩu thất bại");
            }
            try{
                
            }catch(Exception $ex){
                return redirect('home')->with('failed',"Thêm thất bại");
            }
        }else{
            return redirect()->route('admin.login');
        }
    }
}
