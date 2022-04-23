<?php

namespace App\Imports;

use App\Models\Danhmuctaisan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DMTaiSanImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Danhmuctaisan([
            'madmtaisan' => $row['madmtaisan'],
            'tendmtaisan'=> $row['tendmtaisan'],
            'soluong'=> $row['soluong'],
            'donvitinh'=> $row['donvitinh'],
            'ghichu'=> $row['ghichu'],
            'status'=> $row['status'],
        ]);
    }
}
