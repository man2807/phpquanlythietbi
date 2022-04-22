<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ThietBi;
use App\Models\TaiSan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            $bill=DB::table('bills')
                ->whereMonth('created_at', Carbon::now()->month)
                ->get();
            $billOk=DB::table('bills')
                ->whereMonth('created_at', Carbon::now()->month)
                ->where('status', '2')
                ->get();
            $custemers = DB::table('custemers')
                ->whereMonth('created_at', Carbon::now()->month)
                ->get();
            $month = Carbon::now()->month;
            return view('admin.home.index',compact('month','custemers','bill','billOk','user'));
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function getListHoaDon($start,$end){
        $bill = DB::table('bills')
                ->whereBetween('created_at', [$start, $end])
                ->get();
        if(count($bill)){
            return json_decode($bill);
        }
        else{
            return "not found";
        }
    }
    public function login(){
        if(Auth::check()){
            $user = Auth::user();
            return redirect()->route('admin.home.index',compact('user'));
        }else{
            return view('admin.login.index');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.home.index');
    }
    public function ConfLogin(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user["role"] == 3){
                return redirect()->route('admin.member.changepass');
            }
            $request->session()->regenerate();
            return redirect()->route('admin.home.index');
        }
        return redirect('login')->with('failed',"Đăng nhập thất bại");
    }
    public function viewAnymore($data){
        $sku = explode("=", $data);
        $supplie = supplie::where('sku','=',$sku[1])->get();
        return json_decode($supplie);
    }
    public function about()
    { if(Auth::check()){
        $user = Auth::user();
        
        return view('admin.about.index',compact('user'));
    }else{
        return view('admin.login.index');
    }
        # code...
    }
}
