<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Thietbi extends Model
{
    use HasFactory;
    protected $table = "thietbis";

    protected $fillable = ['matb','tentb','iddanhmuc','idbomon','mota','soluong','donvitinh','soluonghong','soluongtot','ghichu','ngaymua','giamua','soluongmuon','makho'];

    public static function getDMTS(){
        $record = DB::table('thietbis')->select('id','matb','tentb','iddanhmuc','idbomon','mota','soluong','donvitinh','soluonghong','soluongtot','ghichu','ngaymua','giamua','soluongmuon','makho','status','created_at','updated_at');
        return $record;
    }
}
