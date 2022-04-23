<?php

namespace App\Exports;

use App\Models\Danhmuctaisan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DMTaiSanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Danhmuctaisan::all();
    }
    public function headings() :array {
    	return ["ID", "Mã DMTS", "Tên DMTS", "Số Lượng","Đơn Vị", "Ghi Chú", "Trạng Thái", "Ngày Tạo", "Ngày Cập nhật"];
    }
}
