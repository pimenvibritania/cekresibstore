@extends('layouts.master')
@section('master')
<div class="card bg-light " id="margtop">
        <div class="card-header ">
         <span style="font-size:25px; "><b>DAFTAR PESANAN ANDA</b></span> 

        </div>
<div class="card-body">
    
<div class="table-responsive ">
    <table class="table table-striped table-bordered mt-4">
        <thead>
            <tr>
                {{-- <th>No</th> --}}
                {{-- <th>Tanggal Order</th> --}}
                {{-- <th>Nama</th> --}}
                <th width="5%">No</th>
                <th width="15%" class="sorting" data-sorting_type="asc" data-column_name="tglOrder" style="cursor: pointer">Tanggal Order <span id="tglOrder_icon"></span></th>
                <th width="10%" class="sorting" data-sorting_type="asc" data-column_name="nama" style="cursor: pointer">Nama <span id="nama_icon"></span></th>
                <th width="10%" class="sorting" data-sorting_type="asc" data-column_name="produk" style="cursor: pointer">Produk <span id="produk_icon"></span></th>

                <th width="20%">Invoice</th>
                <th width="5%">Kurir</th>
                <th width="20%">Resi</th>
                {{-- <th>No HP</th> --}}
                <th width="15%">Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach($tracking as $i => $row)
                <tr>
                    <td>{{ $i+1}}</td>
                    <td>{{ date_format(date_create($row->tglOrder), "d-M-Y") }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->produk }}</td>
                    <td>{{ $row->invoice }}</td>
                    <td>{{ $row->kurir}}</td>
                    <td>{{ $row->resi }}</td>
                    {{-- <td>{{ $row->noHp }}  </td> --}}
                    <td>
                       <div class="row">
                           <div class="col-md-6">
                                <a class="btn btn-info" id="white" href="{{ route('trackuser_show',$row->id) }}" >Lihat</a>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-success" id="white" href="{{ route('trackuser_track',$row->id) }}" >Track</a>        
                
                           </div>
                       </div>
                    </td>
                
                </tr>
                @endforeach 
        </tbody>
    </table>
</div>
</div>

@endsection