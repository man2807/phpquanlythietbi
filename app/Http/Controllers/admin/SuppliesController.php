<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Thietbi;
use App\Models\Taisan;
use App\Models\Danhmuc;
use App\Models\Muon;
use App\Models\Chitietmuon;
use App\Models\User;
use App\Models\Danhmuctaisan;
use App\Imports\DMTaiSanImport;
use App\Exports\DMTaiSanExport;
use App\Imports\TaiSanImport;
use App\Exports\TaiSanExport;
use App\Imports\ThietbiImport;
use App\Exports\ThietbiExport;
use App\Imports\GiaoVienImport;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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

    public function indexts(){
        if(Auth::check()){
            $user = Auth::user();
            $supplie = Taisan::get();
            return view('admin.supplies.indexts',compact('supplie','user'));
        }else{
            #$user = Auth::user();
            $supplie = Taisan::get();
            return view('admin.supplies.indexts',compact('supplie'));
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

    public function muonts(){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $giaoviens = 0;
        if(Auth::check()){
            $user = Auth::user();
            $supplie = Taisan::get();
            return view('admin.supplies.muonvt',compact('giaoviens','today','supplie','user'));
        }else{
            #$user = Auth::user();
            $supplie = Taisan::get();
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

    public function trats(){
        $giaoviens = null;
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        if(Auth::check()){
            $user = Auth::user();
            $supplie = Taisan::get();
            return view('admin.supplies.travt',compact('giaoviens','today','supplie','user'));
        }else{
            #$user = Auth::user();
            $supplie = Taisan::get();
            return view('admin.supplies.travt',compact('giaoviens','today','supplie'));
            //return redirect()->route('admin.login');
        }
    }

    public function create(){
        if(Auth::check()){
            
        }else{
            $category = Danhmuc::get();
            return view('admin.supplies.create',compact('category'));
            //return redirect()->route('admin.login');
        }

    }
    public function createGV(Request $request){
        $data = $request->input();
        $user = new User;
        $user->username = $data["username"];
        $user->password = $data["Password"];
        $user->tengv = $data["tengv"];
        $user->ngaysinh = $data["ngaysinh"];
        $user->idbomon = $data["idbomon"];
        $user->chucvu = $data["chucvu"];
        $user->sdt = $data["sdt"];
        $user->role = 2;
        $user->email = $data["email"];
        $user->status = 1;
        $user->iduser = 0;
        $user->save();
        return redirect('supplies')->with('success',"Tạo thành công !");
    }

    public function nhapexcel(){
        if(Auth::check()){
            $user = Auth::user();
            
        }else{
            $category = Danhmuc::get();
            return view('admin.supplies.nhapexcel',compact('category'));
            //return redirect()->route('admin.login');
        }
    }

    public function postMuonvt(Request $request){
        if(Auth::check()){
                       
        }else{
            $data = $request->input();
            $array = explode(',', $data["data"]);
            $idgv = $data["idgv"];
            
            try{
                $giaovien = User::find($idgv);
                echo($giaovien);

                $muon = new Muon;
                $muon->username = $giaovien->tengv;
                $muon->iduser = $idgv;
                $muon->ngaymuon = Carbon::now('Asia/Ho_Chi_Minh');
                $muon->status = 1;
                $muon->ngaytra = null;
                $muon->save();

                for($i = 0; $i< count($array);$i+=2){
                    $supplie = Thietbi::find($array[$i]);
                    $supplie->soluongmuon = $supplie->soluongmuon + $array[$i+1];
                    $supplie->save();
                    
                    $supplie2 = Thietbi::find($array[$i]);
                    $ctmuon = new Chitietmuon;
                    $ctmuon->matb = $supplie2->matb;
                    $ctmuon->mamuon = $muon->id;
                    $ctmuon->soluongmuon = $array[$i+1];
                    $ctmuon->soluongtratot = null;
                    $ctmuon->soluongtrahong = null;
                    $ctmuon->idbomon = $giaovien->idbomon;
                    $ctmuon->status = 1;
                    $ctmuon->save();
                }
                //return view('admin.supplies.travt',compact('supplie','user'));
                return redirect('supplies/muonvt')->with('success',"Mượn thiết bị thành công !");
                }
            catch(Exception $e)
            {
                return redirect('supplies/muonvt')->with('failed',"Mượn thiết bị thất bại !");
            }
        }           
            //return redirect()->route('admin.login');
    }

    public function postMuonts(Request $request){
        if(Auth::check()){
                       
        }else{
            $data = $request->input();
            $array = explode(',', $data["data"]);
            $idgv = $data["idgv"];
            
            try{
                $giaovien = User::find($idgv);
                echo($giaovien);

                $muon = new Muon;
                $muon->username = $giaovien->tengv;
                $muon->iduser = $idgv;
                $muon->ngaymuon = Carbon::now('Asia/Ho_Chi_Minh');
                $muon->status = 1;
                $muon->ngaytra = null;
                $muon->save();

                for($i = 0; $i< count($array);$i+=2){
                    $supplie = TaiSan::find($array[$i]);
                    $supplie->soluongmuon = $supplie->soluongmuon + $array[$i+1];
                    $supplie->save();
                    
                    $supplie2 = TaiSan::find($array[$i]);
                    $ctmuon = new Chitietmuon;
                    $ctmuon->matb = $supplie2->matb;
                    $ctmuon->mamuon = $muon->id;
                    $ctmuon->soluongmuon = $array[$i+1];
                    $ctmuon->soluongtratot = null;
                    $ctmuon->soluongtrahong = null;
                    $ctmuon->idbomon = $giaovien->idbomon;
                    $ctmuon->status = 1;
                    $ctmuon->save();
                }
                //return view('admin.supplies.travt',compact('supplie','user'));
                return redirect('supplies/travt')->with('success',"Trả thiết bị thành công !");
                }
            catch(Exception $e)
            {
                return redirect('supplies/travt')->with('failed',"Trả sản phẩm thất bại !");
            }
        }           
            //return redirect()->route('admin.login');
    }

    public function postTravt(Request $request){
        if(Auth::check()){  

        }else{
            $data = $request->input();
            $array = explode(',', $data["data"]);
            $idgv = $data["idgv"];
            try{
                $giaovien = User::find($idgv);
                

                $muoncheck = DB::table('muons')->where([
                        ['iduser','=',$data["idgv"]],
                        ['ngaytra','=',null],
                    ])->get();
                foreach($muoncheck as $muon){
                    for($i = 0; $i< count($array);$i+=4){
                        $ctmuons = DB::table('chitietmuons')->where([
                            ['mamuon','=',$muon->id],
                            ['id','=',$array[$i]],
                        ])->get();
                        foreach($ctmuons as $ctmuon){
                            $thietbi = Thietbi::find($array[$i+3]);
                            $thietbi->soluongmuon = $thietbi->soluongmuon - $array[$i+1] - $array[$i+2];
                            $thietbi->save();

                            $chitietmuon= Chitietmuon::find($ctmuon->id);
                            $chitietmuon->soluongmuon = $chitietmuon->soluongmuon - $array[$i+1] - $array[$i+2];
                            $chitietmuon->soluongtratot = $array[$i+1];
                            $chitietmuon->soluongtrahong = $array[$i+2];
                            if($chitietmuon->soluongmuon ==0){
                                $chitietmuon->status = 0;
                            }
                            $chitietmuon->save();

                        }
                    }
                    $tra= Muon::find($muon->id);
                    $tra->ngaytra = Carbon::now('Asia/Ho_Chi_Minh');
                    $tra->save();
                }
                
                //return view('admin.supplies.travt',compact('supplie','user'));
                //return redirect('supplies/travt')->with('success',"Mượn thiết bị thành công !");
                }
            catch(Exception $e)
            {
                //return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
            }
            //return redirect()->route('admin.login');
        }
    }

    public function postTrats(Request $request){
        if(Auth::check()){  

        }else{
            $data = $request->input();
            $array = explode(',', $data["data"]);
            $idgv = $data["idgv"];
            try{
                $giaovien = User::find($idgv);
                

                $muoncheck = DB::table('muons')->where([
                        ['iduser','=',$data["idgv"]],
                        ['ngaytra','=',null],
                    ])->get();
                foreach($muoncheck as $muon){
                    for($i = 0; $i< count($array);$i+=4){
                        $ctmuons = DB::table('chitietmuons')->where([
                            ['mamuon','=',$muon->id],
                            ['id','=',$array[$i]],
                        ])->get();
                        foreach($ctmuons as $ctmuon){
                            $thietbi = Taisan::find($array[$i+3]);
                            $thietbi->soluongmuon = $thietbi->soluongmuon - $array[$i+1] - $array[$i+2];
                            $thietbi->save();

                            $chitietmuon= Chitietmuon::find($ctmuon->id);
                            $chitietmuon->soluongmuon = $chitietmuon->soluongmuon - $array[$i+1] - $array[$i+2];
                            $chitietmuon->soluongtratot = $array[$i+1];
                            $chitietmuon->soluongtrahong = $array[$i+2];
                            if($chitietmuon->soluongmuon ==0){
                                $chitietmuon->status = 0;
                            }
                            $chitietmuon->save();

                        }
                    }
                    $tra= Muon::find($muon->id);
                    $tra->ngaytra = Carbon::now('Asia/Ho_Chi_Minh');
                    $tra->save();
                }
                
                //return view('admin.supplies.travt',compact('supplie','user'));
                //return redirect('supplies/travt')->with('success',"Mượn thiết bị thành công !");
                }
            catch(Exception $e)
            {
                //return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
            }
            //return redirect()->route('admin.login');
        }
    }

    public function postFiltermuontb(Request $request){
        if(Auth::check()){
            
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

    public function postFiltermuonts(Request $request){
        if(Auth::check()){
            
        }else{
            $data = $request->input();
            $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
            $giaoviens = null;
            //$iddata = Object.keys($data);
            //$data["image"] = SuppliesController::insert_image($request);
            if ($data["bomon"] !=0){
                try{ $supplie = Taisan::where('idbomon','=',$data["bomon"])->get();
                    $giaoviens = User::where('idbomon','=',$data["bomon"])->get();         
                    return view('admin.supplies.muonvt',compact('giaoviens','today','supplie'));
                    }
                    catch(Exception $e)
                    {
                        return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                    }
            }else{
                $supplie = Taisan::get();
                return view('admin.supplies.muonvt',compact('giaoviens','today','supplie'));
            }
            //return redirect()->route('admin.login');
        }
    }

    public function postFiltertratb(Request $request){
        if(Auth::check()){
           
        }else{
            $data = $request->input();
            $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
            $giaoviens = null;
            //$iddata = Object.keys($data);
            //$data["image"] = SuppliesController::insert_image($request);
            if ($data["bomon"] !=0 && $data["idgv"] ==null){
                try{ 
                    $supplie = Thietbi::where('idbomon','=',$data["bomon"])->get();
                    $giaoviens = User::where('idbomon','=',$data["bomon"])->get();         
                    return view('admin.supplies.travt',compact('giaoviens','today','supplie'));
                    }
                    catch(Exception $e)
                    {
                        return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                    }
            }
            if ($data["bomon"] == null && $data["idgv"] !=null){
                try{ 
                    $muon = Muon::where('iduser','=',$data["idgv"])->get();
                    $giaoviens = User::where('id','=',$data["idgv"])->get();
                    $supplie = [];
                    $data = new Danhmuc;
                    $dem = 1;
                    foreach($muon as $item){
                        $ctmuon = Chitietmuon::where('mamuon','=',$item->id)->get();
                        $ctmuon = DB::table('chitietmuons')->where([
                            ['mamuon','=',$item->id],
                            ['status','=',1],
                        ])->get();
                        foreach($ctmuon as $item2){
                            $thietbi = Thietbi::where('matb','=',$item2->matb)->get();
                            $data = new Danhmuc;
                            $data->tentb = $thietbi[0]->tentb;
                            $data->mota = $thietbi[0]->mota;
                            $data->soluong = $thietbi[0]->soluong;
                            $data->donvitinh = $thietbi[0]->donvitinh;
                            $data->soluonghong = $thietbi[0]->soluonghong;
                            $data->soluongtot = $thietbi[0]->soluongtot;
                            $data->ghichu = $thietbi[0]->ghichu;
                            $data->ngaymua = $thietbi[0]->ngaymua;
                            $data->giamua = $thietbi[0]->giamua;
                            $data->tongsoluongmuon = $thietbi[0]->soluongmuon;
                            $data->soluongmuon = $item2->soluongmuon;
                            $data->ngaymuon = $item->ngaymuon;
                            $data->idchitietmuon = $item2->id;
                            $data->id = $dem;
                            $data->idtb = $thietbi[0]->id;
                            $dem += 1;
                            //echo($thietbi);
                            $supplie[] = $data;
                        }
                    }
                    
                    foreach($supplie as $ar){
                        echo($ar->tentb);
                    }
                    
                    return view('admin.supplies.xemmuon',compact('giaoviens','today','supplie'));
                    }
                    catch(Exception $e)
                    {
                        //return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                    }
            }
            else{
                $supplie = Thietbi::get();
                return view('admin.supplies.travt',compact('giaoviens','today','supplie'));
            }
            //return redirect()->route('admin.login');
        }
    }

    public function postFiltertrats(Request $request){
        if(Auth::check()){
           
        }else{
            $data = $request->input();
            $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
            $giaoviens = null;
            //$iddata = Object.keys($data);
            //$data["image"] = SuppliesController::insert_image($request);
            if ($data["bomon"] !=0 && $data["idgv"] ==null){
                try{ 
                    $supplie = Taisan::where('idbomon','=',$data["bomon"])->get();
                    $giaoviens = User::where('idbomon','=',$data["bomon"])->get();         
                    return view('admin.supplies.travt',compact('giaoviens','today','supplie'));
                    }
                    catch(Exception $e)
                    {
                        return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                    }
            }
            if ($data["bomon"] == null && $data["idgv"] !=null){
                try{ 
                    $muon = Muon::where('iduser','=',$data["idgv"])->get();
                    $giaoviens = User::where('id','=',$data["idgv"])->get();
                    $supplie = [];
                    $data = new Danhmuc;
                    $dem = 1;
                    foreach($muon as $item){
                        $ctmuon = Chitietmuon::where('mamuon','=',$item->id)->get();
                        $ctmuon = DB::table('chitietmuons')->where([
                            ['mamuon','=',$item->id],
                            ['status','=',1],
                        ])->get();
                        foreach($ctmuon as $item2){
                            $thietbi = Taisan::where('matb','=',$item2->matb)->get();
                            $data = new Danhmuc;
                            $data->tentb = $thietbi[0]->tentb;
                            $data->mota = $thietbi[0]->mota;
                            $data->soluong = $thietbi[0]->soluong;
                            $data->donvitinh = $thietbi[0]->donvitinh;
                            $data->soluonghong = $thietbi[0]->soluonghong;
                            $data->soluongtot = $thietbi[0]->soluongtot;
                            $data->ghichu = $thietbi[0]->ghichu;
                            $data->ngaymua = $thietbi[0]->ngaymua;
                            $data->giamua = $thietbi[0]->giamua;
                            $data->tongsoluongmuon = $thietbi[0]->soluongmuon;
                            $data->soluongmuon = $item2->soluongmuon;
                            $data->ngaymuon = $item->ngaymuon;
                            $data->idchitietmuon = $item2->id;
                            $data->id = $dem;
                            $data->idtb = $thietbi[0]->id;
                            $dem += 1;
                            //echo($thietbi);
                            $supplie[] = $data;
                        }
                    }
                    
                    foreach($supplie as $ar){
                        echo($ar->tentb);
                    }
                    
                    return view('admin.supplies.xemmuonts',compact('giaoviens','today','supplie'));
                    }
                    catch(Exception $e)
                    {
                        //return redirect('supplies/create')->with('failed',"Thêm sản phẩm thất bại !");
                    }
            }
            else{
                $supplie = Taisan::get();
                return view('admin.supplies.travt',compact('giaoviens','today','supplie'));
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
       
    }

    //Danh muc tai san
    public function import()
    {
        // $thietbi = Thietbi::get();
        // return view('admin.supplies.import',compact('thietbi'));
        $data = DB::table('dmtaisans')->get();
        return view('admin.supplies.import', compact('data'));
    }
   
    // public function export()
    // {
    //     // $thietbi = Thietbi::get();
    //     // return view('admin.supplies.import',compact('thietbi'));
    //     $data = DB::table('dmtaisans')->get();
    //     return view('admin.supplies.export', compact('data'));
    // }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new DMTaiSanExport, 'Danh-Sach-Danh-Muc-Tai-San.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import2() 
    {
        Excel::import(new DMTaiSanImport,request()->file('file'));
        return back()->with('success', 'Nhập dữ liệu thành công!');
    }


    // Tai San
    public function importTaiSan()
    {
        // $thietbi = Thietbi::get();
        // return view('admin.supplies.import',compact('thietbi'));
        $data = DB::table('taisans')->get();
        return view('admin.supplies.importTaiSan', compact('data'));
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportTaiSan() 
    {
        return Excel::download(new TaiSanExport, 'Danh-Sach-Tai-San.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importTaiSan2() 
    {
        Excel::import(new TaiSanImport,request()->file('fileTS'));
        return back()->with('success', 'Nhập dữ liệu thành công!');
    }

    // Thiet bi
   public function importThietBi()
    {
        // $thietbi = Thietbi::get();
        // return view('admin.supplies.import',compact('thietbi'));
        $data = DB::table('thietbis')->get();
        return view('admin.supplies.importThietBi', compact('data'));
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportThietBi() 
    {
        return Excel::download(new ThietbiExport, 'Danh-Sach-Thiet-Bi.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importThietBi2() 
    {
        Excel::import(new ThietbiImport,request()->file('fileTB'));
        return back()->with('success', 'Nhập dữ liệu thành công!');
    }

    // Giao Vien
    public function importGiaoVien()
    {
        // $thietbi = Thietbi::get();
        // return view('admin.supplies.import',compact('thietbi'));
        $data = DB::table('users')->get();
        return view('admin.supplies.importGiaoVien', compact('data'));
    }
    public function importGiaoVien2() 
    {
        Excel::import(new GiaoVienImport,request()->file('fileGV'));
        return back()->with('success', 'Nhập dữ liệu thành công!');
    }
}
