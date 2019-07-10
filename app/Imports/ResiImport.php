<?php 

namespace App\Imports;
use Carbon\Carbon;
use App\Resi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsFailures;

use Maatwebsite\Excel\Concerns\Importable;

use PhpOffice\PhpSpreadsheet\Shared\Date;

// HeadingRowFormatter::default('none');
class ResiImport implements ToModel, WithHeadingRow
{

    use Importable, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        try{
        $date = date('Y-m-d', strtotime($row['Tanggal Order']));
        // $date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date))->format('Y-m-d');
        // data kadang fail ketika nge eksekusi baris ini ^^^
        } catch(Exception $e){
            
            return back();
        }
        
        //updateOrCreate = array pertama isikan berdasarkan data yg unique, untuk update, array kedua isikan data yg ingin d create
        return  Resi::updateOrCreate([
            'invoice' => $row['Invoice']],
            [
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
