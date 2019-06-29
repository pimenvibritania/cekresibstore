<?php

namespace App\Imports;

use App\Resi;
use Maatwebsite\Excel\Concerns\ToModel;

class ResiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Resi([
            //
            'id' => $row[0],
            'tglOrder' =>$row[1],
            'invoice' =>$row[2],
            'nama' =>$row[3],
            'noHp' =>$row[4],
            'produk' =>$row[5],
            'provinsi' =>$row[6],
            'kota' =>$row[7],
            'kecamatan' =>$row[8],
            'alamat' =>$row[9],
            'resi' =>$row[10],

        ]);
    }
}
