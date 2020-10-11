<?php

namespace App\Exports;

use App\Models\MasterShift;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;

class MasterShiftsExport implements FromCollection,WithHeadings,WithTitle
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MasterShift::select('shiftId','shiftName')->get();
    }

    public function headings():array
    {
        return [
                  'id',
                  'シフト名'
        ];
    }

    public function title():string
    {
        return 'master_shifts';
    }

}
