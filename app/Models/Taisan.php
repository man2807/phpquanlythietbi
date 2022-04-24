<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TaiSan extends Model
{
    use HasFactory;
    protected $table = "taisans";

    protected $fillable = ['mataisan','tentaisan','iddanhmuc','mota','ghichu','ngaymua','giamua','tinhtrang','vitri','status'];

    public static function getCustomer(){
        $record = DB::table('taisans')->select('id','mataisan','tentaisan','iddanhmuc','mota','ghichu','ngaymua','giamua','tinhtrang','vitri','status','created_at','updated_at');
        return $record;
    }
}
