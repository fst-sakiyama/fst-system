<?php

namespace App\Imports;

use App\Models\ShiftTable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Excel;

class ShiftTablesImport implements ToModel,WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return $row;
    }

    public function chunkSize(): int
    {
        return 100;
    }

}
