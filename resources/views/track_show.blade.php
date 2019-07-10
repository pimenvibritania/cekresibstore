@extends('layouts.master')

@section('master')
    
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