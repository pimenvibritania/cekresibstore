@extends('layouts.master')

@section('master')

<div class="container" id="margtop">
    <div class="card">
        <div class="card-header ">
            <a class="float-right btn btn-danger" href="{{ route('resi.index')}}" >Kembali</a>    
            <h1>INVOICE : {{$resi->invoice}}</h1>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5 >Nama :</h5>
                <span>{{$resi->nama}}</span>
                <hr>
            </div>
            <div class="col-md-6">
                <h5 >Tanggal Order :</h5> 
                <span>{{date_format(date_create($resi->tglOrder), "d-M-Y")}}</span>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5 >No HP :</h5>
                <span>{{$resi->noHp}}</span>
                <hr>
            </div>
            <div class="col-md-6">
                <h5 >Produk :</h5> 
                <span>{{$resi->produk}}}}</span>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5 >Alamat :</h5>
                <span>
                    {{$resi->alamat}}. <br> Kecamatan {{$resi->kecamatan}},
                    Kota {{$resi->kota}}, Provinsi {{$resi->provinsi}}                  
                </span>
                <hr>
            </div>
            <div class="col-md-6">
                <h5 >Reseller :</h5>
                <span>
                    <p>Nama Reseller : {{$resi->nama_reseller}}</p>
                    <p>Email Reseller : {{$resi->email_reseller}}</p>                  
                </span>
                <hr>
            </div>
        </div>
    </div>
    <div class="card-footer text-center">
        <h4>No Resi : {{$resi->resi}} | ({{$resi->kurir}})</h4>
    </div>
    </div>

    @if ($waybill == true)
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Detail</div>
                <div class="card-body">
                    <ul>
                       {{-- {{dd($waybill)}} --}}
                        <li>No Resi : <b> {{$waybill['details']['waybill_number']}}</b></li>
                        <li>Waktu Pengiriman : {{$waybill['details']['waybill_date']}} - {{$waybill['details']['waybill_time']}}</li>
                        <li>Alamat Pengiriman : {{$waybill['details']['origin']}}</li>
                        <li>Tujuan : {{$waybill['details']['destination']}}</li>
                        <li>Berat : {{$waybill['details']['weight']}} Kg</li>
                        <li>Nama Pengirim : {{$waybill['details']['shippper_name']}}</li>
                        <li>Alamat Pengirim : {{$waybill['details']['shipper_address1']}} - {{$waybill['details']['shipper_city']}}</li>
                        <li>Nama Penerima : {{$waybill['details']['receiver_name']}}</li>
                        <li>Alamat Penerima : {{$waybill['details']['receiver_address1']}} - {{$waybill['details']['receiver_address2']}} - {{$waybill['details']['receiver_address3']}} - Kota : {{$waybill['details']['receiver_city']}}</li>
                       
                    </ul> 
                </div>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Status Pengiriman</div>
                <div class="card-body">
                    <li>Status : <b>{{$waybill['delivery_status']['status']}}</b></li>
                    <li>Nama Penerima : {{$waybill['delivery_status']['pod_receiver']}}</li>
                    <li>Waktu Diterima : {{$waybill['delivery_status']['pod_date']}} - {{$waybill['delivery_status']['pod_time']}}</li>
                </div>
            </div>
        </div>
        @else
            <div class="card">
                <div class="card-header">
                    <div class="text-center">Paket akan dikirimkan</div>
                </div>
            </div>
        @endif
    </div>
</div>

@endsection
