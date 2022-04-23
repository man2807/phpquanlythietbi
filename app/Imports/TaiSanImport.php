<?php

namespace App\Imports;

use App\Models\TaiSan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaiSanImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TaiSan([
            'mataisan'=>$row['mataisan'],
            'tentaisan'=>$row['tentaisan'],
            'iddanhmuc'=>$row['iddanhmuc'],
            'mota'=>$row['mota'],
            'ghichu'=>$row['ghichu'],
            'ngaymua'=>$row['ngaymua'],
            'giamua'=>$row['giamua'],
            'tinhtrang'=>$row['tinhtrang'],
            'vitri'=>$row['vitri'],
            'status'=>$row['status'],
        ]);
    }
}
