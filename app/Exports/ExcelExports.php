<?php

namespace App\Exports;

use App\Models\supplie;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return supplie::all();
    }
}
