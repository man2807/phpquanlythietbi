<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Thietbi;
use App\Models\Danhmuc;
use App\Models\Muon;
use App\Models\Chitietmuon;
use App\Models\User;
use Exception;
use Carbon\Carbon;

class SuppliesController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            $supplie = Thietbi::get();
            return view('admin.supplies.index',compact('supplie','user'));
        }else{
            #$user = Auth::user();
            $supplie = Thietbi::get();
            return view('admin.supplies.index',compact('supplie'));
            //return redirect()->route('admin.login');
        }
    }

    public function muonvt(){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $giaoviens = 0;
        if(Auth::check()){
            $user = Auth::user();
            $supplie = Thietbi::get();
            return view('admin.supplies.muonvt',compact('giaoviens','today','supplie','user'));
        }else{
            #$user = Auth::user();
            $supplie = Thietbi::get();
            return view('admin.supplies.muonvt',compact('giaoviens','today','supplie'));
            //return redirect()->route('admin.login');
        }
    }

    public function travt(){
        $giaoviens = null;
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        if(Auth::check()){
            $user = Auth::user();
            $supplie = Thietbi::get();
            return view('admin.supplies.travt',compact('giaoviens','today','supplie','user'));
        }else{
            #$user = Auth::user();
            $supplie = Thietbi::get();
            return view('admin.supplies.travt',compact('giaoviens','today','supplie'));
            //return redirect()->route('admin.login');
        }
    }

    public function create(){
        if(Auth::check()){
            $user = Auth::user();
            $category = category::get();
            return view('admin.supplies.create',compact('category','user'));
        }else{
            $category = Danhmuc::get();
            return view('admin.supplies.create',compact('category'));
            //return redirect()->route('admin.login');
        }
    }

    public function nhapexcel(){
        if(Auth::check()){
            $user = Auth::user();
            $category = category::get();
            return view('admin.supplies.nhapexcel',compact('category','user'));
        }else{
            $category = Danhmuc::get();
            return view('admin.supplies.nhapexcel',compact('category'));
            //return redirect()->route('admin.login');
        }
    }
    
    public function inputSupplie(Request $request){
        if(Auth::check()){
            $data = $request->input();
            //$data["image"] = SuppliesController::insert_image($request);
            try{ $supplie = new Thietbi;
                $supplie->matb= $data['matb'];
                $supplie->tentb = $data['tentb'];
                $supplie->iddanhmuc = $data['iddanhmuc'];
                $supplie->idbomon = $data['idbomon'];
                $supplie->mota = $data['mota'];
                $supplie->soluong = $data['soluong'];
                $supplie->donvitinh = $data['donvitinh'];
                $supplie->soluonghong = $data['soluonghong'];
                $supplie->soluongtot = $data['soluongtot'];
                $supplie->ghichu = $data['ghichu'];
                $supplie->ngaymua = $data['ngaymua'];
                $supplie->soluongmuon = $data['soluongmuon'];
                $supplie->makho = $data['makho'];
                $supplie->status = 0;
                $supplie->save();
                return redirect('supplies')->with('success',"Thêm sản phẩm thành công !");
                }
                catch(Exception $e)
                { 
                    echo($e);
                    return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                }
        }else{
            return redirect()->route('admin.login');
        }
    } 

    public function postMuonvt(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $data = $request->input();
            //$data["image"] = SuppliesController::insert_image($request);
            foreach($iddatas as $iddata){
                try{ $supplie = Thietbi::find();
                    $supplie->soluongmuon = $supplie->soluongmuon - $data[$iddata];

                    $muon = new Muon;
                    $muon->mamuon= $muon->id;
                    $muon->username = $user->username;
                    $muon->ngaymuon = Carbon::now('Asia/Ho_Chi_Minh');
                    $muon->ngaytra = null;
                    $muon->status = 0;
    
                    $ctmuon = new Chitietmuon;
                    $ctmuon->matb = $supplie->matb;
                    $ctmuon->mamuon = $muon->mamuon;
                    $ctmuon->soluongmuon = $data[$iddata];
                    $ctmuon->soluongtratot = 0;
                    $ctmuon->soluongtrahong = 0;
                    $ctmuon->idbomon = 0;
                    $ctmuon->status = 0;
                    return view('admin.supplies.travt',compact('supplie','user'));
                    }
                catch(Exception $e)
                {
                    return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                }
            }            
        }else{
            $data = $request->input();
            $array = explode(',', $data["data"]);
            $idgv = $data["idgv"];
            try{
                for($i = 0; $i< count($array);$i+=2){
                    $supplie = Thietbi::find($array[$i]);
                    $supplie->soluongmuon = $supplie->soluongmuon + $array[$i+1];
                    $supplie->save();

                    $giaovien = User::find($idgv);
                    $muoncheck = Muon::where('iduser','=',$idgv)->get();

                    if($muoncheck==null){
                        $muon = new Muon;
                        $muon->username = $giaovien->tengv;
                        $muon->iduser = $idgv;
                        $muon->ngaymuon = Carbon::now('Asia/Ho_Chi_Minh');
                        $muon->status = 1;
                        $muon->ngaytra = null;
                        $muon->save();
                    }
                    
                    $muon2 = Muon::where('iduser','=',$idgv)->get();
                    $supplie2 = Thietbi::find($array[$i]);
                    $ctmuon = new Chitietmuon;
                    $ctmuon->matb = $supplie2->matb;
                    $ctmuon->mamuon = $muon2[0]->id;
                    $ctmuon->soluongmuon = $array[$i+1];
                    $ctmuon->soluongtratot = null;
                    $ctmuon->soluongtrahong = null;
                    $ctmuon->idbomon = $giaovien->idbomon;
                    $ctmuon->status = 1;
                    $ctmuon->save();
                }
                
                //return view('admin.supplies.travt',compact('supplie','user'));
                $supplie = Thietbi::get();
                return redirect('supplies/travt')->with('success',"Mượn thiết bị thành công !");
                }
            catch(Exception $e)
            {
                return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
            }
        }           
            //return redirect()->route('admin.login');
    }

    public function postTravt(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $data = $request->input();
            //$iddata = Object.keys($data);
            //$data["image"] = SuppliesController::insert_image($request);
            try{ $supplie = Thietbi::find();               

                $ctmuon = new Chitietmuon;
                $ctmuon->matb= $supplie->matb;
                $ctmuon->mamuon = $muon->mamuon;
                $ctmuon->soluongmuon = null;
                $ctmuon->soluongtratot = null;
                $ctmuon->soluongtrahong = 0;
                $ctmuon->idbomon = 0;
                $ctmuon->status = 0;
                return view('admin.supplies.travt',compact('supplie','user'));
                }
                catch(Exception $e)
                {
                    return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                }
        }else{
            return redirect()->route('admin.login');
        }
    }

    public function postFiltermuontb(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $data = $request->input();
            $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
            //$iddata = Object.keys($data);
            //$data["image"] = SuppliesController::insert_image($request);
            try{ $supplie = Thietbi::find($data["bomon"]);               
                return view('admin.supplies.muonvt',compact('giaoviens','supplie','user'));
                }
                catch(Exception $e)
                {
                    return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                }
        }else{
            $data = $request->input();
            $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
            $giaoviens = null;
            //$iddata = Object.keys($data);
            //$data["image"] = SuppliesController::insert_image($request);
            if ($data["bomon"] !=0){
                try{ $supplie = Thietbi::where('idbomon','=',$data["bomon"])->get();
                    $giaoviens = User::where('idbomon','=',$data["bomon"])->get();         
                    return view('admin.supplies.muonvt',compact('giaoviens','today','supplie'));
                    }
                    catch(Exception $e)
                    {
                        return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                    }
            }else{
                $supplie = Thietbi::get();
                return view('admin.supplies.muonvt',compact('giaoviens','today','supplie'));
            }
            //return redirect()->route('admin.login');
        }
    }

    public function postFiltertratb(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $data = $request->input();
            $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
            //$iddata = Object.keys($data);
            //$data["image"] = SuppliesController::insert_image($request);
            try{ $supplie = Thietbi::find($data["bomon"]);               
                return view('admin.supplies.muonvt',compact('giaoviens','supplie','user'));
                }
                catch(Exception $e)
                {
                    return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                }
        }else{
            $data = $request->input();
            $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
            $giaoviens = null;
            //$iddata = Object.keys($data);
            //$data["image"] = SuppliesController::insert_image($request);
            if ($data["bomon"] !=0){
                try{ $supplie = Thietbi::where('idbomon','=',$data["bomon"])->get();
                    $giaoviens = User::where('idbomon','=',$data["bomon"])->get();         
                    return view('admin.supplies.tra',compact('giaoviens','today','supplie'));
                    }
                    catch(Exception $e)
                    {
                        return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                    }
            }else{
                $supplie = Thietbi::get();
                return view('admin.supplies.muonvt',compact('giaoviens','today','supplie'));
            }
            //return redirect()->route('admin.login');
        }
    }

    public function postFiltergv(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $data = $request->input();
            $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
            //$iddata = Object.keys($data);
            //$data["image"] = SuppliesController::insert_image($request);
            try{ $supplie = Thietbi::find($data["bomon"]);               
                return view('admin.supplies.travt',compact('month','supplie','user'));
                }
                catch(Exception $e)
                {
                    return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                }
        }else{
            $data = $request->input();
            $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
            $giaoviens = null;
            //$iddata = Object.keys($data);
            //$data["image"] = SuppliesController::insert_image($request);
            if ($data["bomon"] !=0){
                try{ $supplie = Thietbi::where('idbomon','=',$data["bomon"])->get();
                    $giaoviens = User::where('idbomon','=',$data["bomon"])->get();         
                    return view('admin.supplies.muonvt',compact('giaoviens','today','supplie'));
                    }
                    catch(Exception $e)
                    {
                        return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                    }
            }else{
                $supplie = Thietbi::get();
                return view('admin.supplies.muonvt',compact('giaoviens','today','supplie'));
            }
            //return redirect()->route('admin.login');
        }
    }


    static function insert_image($request)
    {
        $get_image = $request ->file('images');
        if($get_image){
            $get_name_image = $get_image ->getClientOriginalName();
            $extension = $get_image->getClientOriginalExtension();
            $name_image = current(explode('.',$get_name_image));
            $new_image = "img_".rand(11111111,99999999).".".$extension;
            $get_image->move('uploads',$new_image);
            return  "/uploads//".$new_image;
        }
        return  "Hỏng";
        # code...
    }
    public function delete($id){
        try{ 
            $supplie =  supplie::find($id); 
            if($supplie != null){
                $supplie->delete();
                return "success";
            }else{
                return "noid";
            }
        }catch(Exception $ex){
            return "false";
            }
    }
}
