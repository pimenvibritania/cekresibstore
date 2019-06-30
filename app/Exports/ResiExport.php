<?php

namespace App\Exports;

use App\Resi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ResiExport implements FromView
{
    public function view(): View
    {
        return view('excel', [
            'resis' => Resi::all()
        ]);
    }
}
