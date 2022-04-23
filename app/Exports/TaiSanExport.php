<?php

namespace App\Exports;

use App\Models\TaiSan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TaiSanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TaiSan::all();
    }
    public function headings() :array {
    	return ["ID", "Mã Tài Sản", "Tên Tài Sản", "Mã DMTS","Mô tả", "Ghi Chú","Ngày mua","Giá mua","Tình Trạng","Vị trí", "Trạng Thái", "Ngày Tạo", "Ngày Cập nhật"];
    }
}
