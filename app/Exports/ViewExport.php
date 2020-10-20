<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ViewExport implements FromView
{
    private $view;

    public function __construct(View $view)
    {
       $this->view = $view;
    }

    public function view():View
    {
        return $this->view;
    }
}
