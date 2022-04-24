<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class GiaoVien extends Model
{
    use HasFactory;
    protected $table = "users";
        /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    protected $fillable = ['iduser','username','password','role','tengv','ngaysinh','idbomon','chucvu','sdt','email','status'];

    public static function getUsers(){
        $record = DB::table('users')->select('id','iduser','username','password','role','tengv','ngaysinh','idbomon','chucvu','sdt','email','status');
        return $record;
    }
}
