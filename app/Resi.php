<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resi extends Model
{
    //
    protected $fillable=[
        'tglOrder', 'invoice', 'nama', 'noHp', 'produk',
        'provinsi', 'kota', 'kecamatan','alamat', 'email_reseller', 'nama_reseller', 'kurir'

    ];
}
