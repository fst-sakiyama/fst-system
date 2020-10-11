<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport implements FromCollection,WithHeadings,WithTitle
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::whereNotNull('display_shift')->select('id','name')->get();
    }

    public function headings():array
    {
        return [
                  'id',
                  '名前'
        ];
    }

    public function title():string
    {
        return 'users';
    }

}
