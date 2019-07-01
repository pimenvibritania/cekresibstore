@extends('layouts.master')

@section('master')
@if (count($tracking) < 1)

<div class="container text-center" >
    <div style="padding-top: 50px;" class="mb-5">
        
        <h1>INVOICE NOT FOUND</h1>

    </div>
    <a href="{{route('track')}}">
        <i  style="font-size: 150px;" class="fas fa-sync-alt"></i>
    </a>
</div>

@else

<table border="1">
    <tr>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Umur</th>
        <th>Alamat</th>
    </tr>
    
    @foreach($tracking as $key => $p)
    <tr>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->invoice }}</td>
        <td>{{ $p->kota }}</td>
        <td>{{ $p->produk }}</td>
    </tr>
    @endforeach
    @endif

</table>
@endsection