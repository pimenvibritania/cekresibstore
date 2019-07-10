@extends('layouts.master')

@section('master')

<div class="container" id="margtop">
    <div class="card">
        <div class="card-header ">
            <a class="float-right btn btn-danger" href="{{ url()->previous()}}" >Kembali</a>    
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

@endsection
