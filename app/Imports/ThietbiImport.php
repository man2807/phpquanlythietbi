<?php

namespace App\Imports;

use App\Models\Thietbi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ThietbiImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Thietbi([
            'matb'=>$row['matb'],
            'tentb'=>$row['tentb'],
            'iddanhmuc'=>$row['iddanhmuc'],
            'idbomon'=>$row['idbomon'],
            'mota'=>$row['mota'],
            'soluong'=>$row['soluong'],
            'donvitinh'=>$row['donvitinh'],
            'soluonghong'=>$row['soluonghong'],
            'soluongtot'=>$row['soluongtot'],
            'ghichu'=>$row['ghichu'],
            'ngaymua'=>$row['ngaymua'],
            'giamua'=>$row['giamua'],
            'soluongmuon'=>$row['soluongmuon'],
            'makho'=>$row['makho'],
        ]);
    }
}
