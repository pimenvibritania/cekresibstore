@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header text-center"><h1>INVOICE : {{$resi->invoice}}</h1></div>
        <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5 >Nama :</h5> <span>{{$resi->nama}}</span>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        </div>
    </div>

</div>

@endsection
