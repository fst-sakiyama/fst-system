<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class WorkSheetsExport implements FromView,WithTitle
{
    private $view;
    private $userName;

    public function __construct(View $view,$userName)
    {
       $this->view = $view;
       $this->userName = $userName;
    }

    public function view():View
    {
        return $this->view;
    }

    public function title():string
    {
        return $this->userName;
    }

}
