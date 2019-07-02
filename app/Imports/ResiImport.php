<?php

namespace App\Imports;
use Carbon\Carbon;

use App\Resi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

// HeadingRowFormatter::default('none');

class ResiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $date = $row['Tanggal Order'];
        // $date = strtotime($date);
        // $date = new DateTime($date);
        $date = date_create($date);
        $date = date_format($date, "Y-m-d");
        // $date = Date::excelToDateTimeObject($date);
        // dd($date);
        // $row->formatDates(false);
        // $row->setDateFormat('Y-m-d');
        return new Resi([
            //
            'tglOrder' => $date,
            'invoice' =>$row['Invoice'],
            'kurir'=>$row['Kurir'],
            'nama' =>$row['Nama'],
            'noHp' =>$row['No Hp'],
            'produk' =>$row['Product'],
            'provinsi' =>$row['Provinsi'],
            'kota' =>$row['Kota'],
            'kecamatan' =>$row['Kecamatan'],
            'alamat' =>$row['Alamat'],
            'resi' =>$row['Resi'],
            'email_reseller' => $row['Email Reseller'],
            'nama_reseller' => $row['Nama Reseller'],
        ]);
    }
}
