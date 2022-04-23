<?php

namespace App\Imports;

use App\Models\GiaoVien;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GiaoVienImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GiaoVien([
            'iduser'=>$row['iduser'],
            'username'=>$row['username'],
            'password' => \Hash::make($row['password']),
            'role'=>$row['role'],
            'tengv'=>$row['tengv'],
            'ngaysinh'=>$row['ngaysinh'],
            'idbomon'=>$row['idbomon'],
            'chucvu'=>$row['chucvu'],
            'sdt'=>$row['sdt'],
            'email'=>$row['email'],
            'status'=>$row['status'],
        ]);
    }
}
