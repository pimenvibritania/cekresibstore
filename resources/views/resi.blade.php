
@extends('layouts.master')

@section('master')

<style>
.btn-searchh {
        background: #17A2B8;
        border-radius: 0;
        color: #fff;
        border-width: 1px;
        border-style: solid;
        border-color: #17A2B8;
      }
      .btn-searchh:link, .btn-searchh:visited {
        color: #fff;
      }
      .btn-searchh:active, .btn-searchh:hover {
        background: #1c1c1c;
        color: #fff;
        border-color: #1c1c1c;
      }
</style>


    <div class="card bg-light " id="margtop">
        <div class="card-header ">
         <span style="font-size:25px; "><b>DAFTAR INVOICE</b></span> 
            @hasrole('admin')
             <a class="btn btn-danger float-right " style="color: white !important;" href="{{ route('export') }}">Export User Data</a>
            @endhasrole
        </div>
        <div class="card-body">
           
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Masukkan Nama / INV / Resi / Tanggal </label>
                        <div class="input-group">
                            <form action="{{route('fetch_data')}}" method="GET">
                                    <div class="input-group-append">
                                <input type="text" class="form-control mr-2" name="cari" placeholder="Cari..." value="{{old('cari')}}">
                                    <button class="btn btn-outline-secondary" type="submit" value="CARI"><i class="fa fa-search fa-fw"></i> Cari</button>
                                </div>
                            </form>
                        </div>

                    </div>

                    @hasrole('admin')
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Upload file berformat 'xlsx'</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <input type="file" name="file" class="custom-file-input" id="import">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="btn input-group-text" disabled >Upload</button>
                            {{-- <span class="input-group-text" id="">Upload</span> --}}
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                    @endhasrole
                </div>

           
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            {{-- <th>No</th> --}}
                            {{-- <th>Tanggal Order</th> --}}
                            {{-- <th>Nama</th> --}}
                            <th width="5%">No</th>
                            <th width="15%" class="sorting" data-sorting_type="asc" data-column_name="tglOrder" style="cursor: pointer">Tanggal Order <span id="tglOrder_icon"></span></th>
                            <th width="10%" class="sorting" data-sorting_type="asc" data-column_name="nama" style="cursor: pointer">Nama <span id="nama_icon"></span></th>
                            <th width="10%" class="sorting" data-sorting_type="asc" data-column_name="produk" style="cursor: pointer">Produk <span id="produk_icon"></span></th>

                            <th width="15%">Invoice</th>
                            <th width="5%">Kurir</th>
                            <th width="15%">Resi</th>
                            {{-- <th>No HP</th> --}}
                            <th width="15%">Action</th>
                            <th width="10%">Notifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('resi_data')
                    </tbody>
                </table>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />

            </div>
        </div>
    </div>
{{-- </div> --}}

@endsection