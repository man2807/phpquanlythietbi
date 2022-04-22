<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\supplie;
use App\Models\bill;
use App\Models\custemer;
use App\Exports\ExcelExports;
use Exception;
use Excel;

class BillController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            $supplie = supplie::where('status','=','1')->get();
            return view('admin.bill.index',compact('supplie','user'));
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function update(){
        if(Auth::check()){
            $user = Auth::user();
            $supplie = supplie::where('status','=','1')->get();
            return view('admin.bill.update',compact('supplie','user'));
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function getInfo($phone){
        $custemer = custemer::where('phone','=',$phone)->get();
        if(count($custemer)){
             return json_decode($custemer);
        }
        else{
             return "not found";
        }
    }
    public function getInfoWith($id){
        $custemer = custemer::where('id','=',$id)->get();
        if(count($custemer)){
             return json_decode($custemer);
        }
        else{
             return "not found";
        }
    }
    public function mahoadon($mahoadon){
        $bill = bill::where('id','=',$mahoadon)->get();
        if(count($bill)){
             return json_decode($bill);
        }
        else{
             return "not found";
        }
    }
    public function export($month){
        return Excel::download(new ExcelExports(),'data.xlsx');
    }
    public function getBill($mahoadon){
        $bill = bill::where('id','=',$mahoadon)->get();
        if(count($bill)){
             return json_decode($bill);
        }
        else{
             return "not found";
        }
    }
    public function vattu($vattu){
        $supplie = supplie::where('id','=',$vattu)->get();
        if(count($supplie)){
             return json_decode($supplie);
        }
        else{
             return "not found";
        }
    }
    public function sendUpdate(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $supplie = supplie::where('status','=','1')->get();
            $data = $request->input();
            try{  $bill = new bill;
                $bill->id_user= $user['id'];
                $bill->id_custemer = $data['id_custemer'];
                $bill->time_in = $data['time_in'];
                $bill->time_out = $data['time_out'];
                $bill->name_pc = $data['name_pc'];
                $bill->content = $data['content'];
                $bill->note = $data['note'];
                $bill->suachua = $data['suachua'];
                $bill->supplie = $data['supplie'];
                $bill->listSupplie = $data['listVat'];
                $obj = explode(",",$data['listVat']);
                for($i = 0; $i < count($obj);$i++){
                    if(strlen($obj[$i]) >= 1){
                        $supp = supplie::find($obj[$i]);
                        $cout = $supp->sl;
                        $cout -= 1;
                        $supp->sl = $cout;
                        $supp->save();
                    }
                }
                $bill->status = 1;
                $bill->save();
                return redirect('bill')->with('success',"Tạo thành công !(Mã hóa đơn: HD-".$bill->id.")");
                }
                catch(Exception $e)
                { 
                    return redirect('bill')->with('failed',"Tạo thất bại !");
                }
            return view('admin.bill.index',compact('supplie','user'));
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function sendUpdateBill(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $data = $request->input();
            try{  $bill = bill::find($data["id"]);
                $bill->id_custemer = $data['id_custemer'];
                $bill->time_in = $data['time_in'];
                $bill->time_out = $data['time_out'];
                $bill->name_pc = $data['name_pc'];
                $bill->content = $data['content'];
                $bill->note = $data['note'];
                $bill->suachua = $data['suachua'];
                $bill->supplie = $data['supplie'];
                $bill->listSupplie = $data['listVat'];
                $bill->status = $data['status'];
                $bill->save();
                return redirect('bill/update')->with('success',"Cập nhật thành công !(Mã hóa đơn: HD-".$bill->id.")");
                }
                catch(Exception $e)
                { 
                    return redirect('bill/update')->with('failed',"Cập nhật thất bại !");
                }
            return view('admin.bill.index',compact('supplie','user'));
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function custemer(){
        if(Auth::check()){
            $user = Auth::user();
            $supplie = supplie::where('status','=','1')->get();
            return view('admin.bill.custemer',compact('supplie','user'));
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function sendCustemer(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $supplie = supplie::where('status','=','1')->get();
            $data = $request->input();
            //Thêm mới sẽ vào đây nhé
            if(isset($_POST["add"])){
                try{  $custemer = new custemer;
                    $custemer->name= $data['name_ct'];
                    $custemer->email = $data['email'];
                    $custemer->phone = $data['phone'];
                    $custemer->msv = $data['msv'];
                    $custemer->address = $data['address'];
                    $custemer->status = 1;
                    $custemer->save();
                    return redirect('bill/custemer')->with('success',"Thêm thành công !");
                    }
                    catch(Exception $e)
                    { 
                        return redirect('bill/custemer')->with('failed',"Thêm thất bại !");
                    }
            }
            
            return view('admin.bill.index',compact('supplie','user'));
        }else{
            return redirect()->route('admin.login');
        }
    }
}
