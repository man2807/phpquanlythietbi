<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Danhmuctaisan extends Model
{
    use HasFactory;
    protected $table = "dmtaisans";

    protected $fillable = ['madmtaisan','tendmtaisan','soluong','donvitinh','ghichu','status'];

    public static function getDMTS(){
        $record = DB::table('dmtaisans')->select('id','madmtaisan','tendmtaisan','soluong','donvitinh','ghichu','status');
        return $record;
    }
}
