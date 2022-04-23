<?php

namespace App\Exports;

use App\Models\Thietbi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThietbiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Thietbi::all();
    }
    public function headings() :array {
    	return ["ID", "Mã Thiết Bị", "Tên Thiết Bị", "Mã DMTB","Mã Bộ môn", "Mô tả","Số lượng","Đơn vị tính","Số lượng hỏng","Số lượng tốt", "Ghi chú", "Ngày mua","Giá mua","Số lượng mượn","Mã kho","Trạng thái","Ngày Tạo", "Ngày Cập nhật"];
    }
}
