<?php

namespace App\Exports;

use App\Resi;
use Maatwebsite\Excel\Concerns\FromCollection;

class ResiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Resi::all();
    }
}
