
@extends('layouts.master')

@section('master')
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

<div class="row" style="margin-top: 10px;">

      <div class="col-md-12"> 
            <div style="background-color:#343a40; padding: 10px; align-content: center; text-align:center; color: white; font-weight:bold" >
                  TERKIRIM

            </div>
            <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                        <thead>
                              <tr>
                                    <th>
                                          Tanggal
                                    </th>
                                    <th>
                                          Nama
                                    </th>
                                    <th>
                                          Invoice
                                    </th>
                                    <th>
                                          Resi
                                    </th>
                              </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $d)
                        
                              {{!$res = App\Resi::where('resi', $d->resi)->first()}}
                              <?php
                              $rajaongkir = new Steevenz\Rajaongkir('02ae756b2db51fac3f0f88fa25e92339', Steevenz\Rajaongkir::ACCOUNT_PRO);
                              $config['api_key'] = '02ae756b2db51fac3f0f88fa25e92339';
                              $config['account_type'] = 'pro';
                              $rajaongkir = new Steevenz\Rajaongkir($config);
                              $ex = 0;
                  
                              $waybill = $rajaongkir->getWaybill($res->resi, $res->kurir);
                              // $ex = $waybill['delivery_status']['status']
                  
                              if ($waybill['delivery_status']['status'] == "DELIVERED") {
                                    # code...
                                    $ex = 1;
                  
                              } else {
                                    # code...
                                    $ex = 2;
                  
                              }
                              
                  
                              //      dd($waybill);
                              // if ($waybill == true) {
                              
                              //     # code...
                              //     echo " <b>{$waybill['delivery_status']['status']}</b>";
                              // } else {
                              //     # code...
                              //     echo"Resi tidak valid";
                              // }
                              
                  
                              ?>
                              <tr>
                                    <td>
                                          @if ($ex == 1)
                                          {{$d->tglOrder}}
                                          @else
                                          {{!$d->tglOrder}}
                                          @endif
                                          
                  
                  
                                    </td>
                                         
                                    <td>
                                          @if ($ex == 1)
                                          {{-- <b> aktif</b> --}}
                                          {{$d->nama}}
                                          @else
                                          {{!$d->nama}}
                                          @endif
                                    </td>
                                    <td>
                                          @if ($ex == 1)
                                          {{$d->invoice}}
                                          @else
                                          {{!$d->invoice}}
                                          @endif
                                    </td>
                                    <td>
                                          @if ($ex == 1)
                                          {{$d->resi}}
                                          @else
                                          {{!$d->resi}}
                                          @endif
                                    </td>
                                    {{-- <td>
                                          @if ($ex == 2)
                                          <b>mati</b>
                                          {{$d->nama}}
                                          @else
                                          {{!$d->nama}}
                                          @endif
                                    </td> --}}
                              
                              </tr>
                              
                  
                  
                        @endforeach
                        </tbody>
                  </table>
            </div>           
      </div>
      <div class="col-md-12">
            <div style="background-color:brown; padding: 10px; align-content: center; text-align:center; color:white; font-weight:bold" >
                  BELUM TERKIRIM
      
            </div>
            <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                        <thead>
                              <tr>
                                    <th>
                                          Tanggal
                                    </th>
                                    <th>
                                          Nama
                                    </th>
                                    <th>
                                          Invoice
                                    </th>
                                    <th>
                                          Resi
                                    </th>
                              </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $d)
                              
                              {{!$res = App\Resi::where('resi', $d->resi)->first()}}
                              <?php
                              $rajaongkir = new Steevenz\Rajaongkir('02ae756b2db51fac3f0f88fa25e92339', Steevenz\Rajaongkir::ACCOUNT_PRO);
                              $config['api_key'] = '02ae756b2db51fac3f0f88fa25e92339';
                              $config['account_type'] = 'pro';
                              $rajaongkir = new Steevenz\Rajaongkir($config);
                              $ex = 0;
                        
                              $waybill = $rajaongkir->getWaybill($res->resi, $res->kurir);
                              // $ex = $waybill['delivery_status']['status']
                        
                              if ($waybill['delivery_status']['status'] == "DELIVERED") {
                                    # code...
                                    $ex = 1;
                        
                              } else {
                                    # code...
                                    $ex = 2;
                        
                              }
                              
                        
                              //      dd($waybill);
                              // if ($waybill == true) {
                                    
                              //     # code...
                              //     echo " <b>{$waybill['delivery_status']['status']}</b>";
                              // } else {
                              //     # code...
                              //     echo"Resi tidak valid";
                              // }
                              
                        
                              ?>
                              <tr>
                                    {{-- <td>
                                          @if ($ex == 1)
                                                <b> aktif</b>
                                                {{$d->nama}}
                                          @else
                                                {{!$d->nama}}
                                          @endif
                        
                        
                                    </td> --}}
                                    <td>
                                          @if ($ex == 2)
                                                {{$d->tglOrder}}
                                          @else
                                                {{!$d->tglOrder}}
                                          @endif
                                    </td>
                                    <td>
                                          @if ($ex == 2)
                                                {{$d->nama}}
                                          @else
                                                {{!$d->nama}}
                                          @endif
                                    </td>
                                    <td>
                                          @if ($ex == 2)
                                                {{$d->invoice}}
                                          @else
                                                {{!$d->invoice}}
                                          @endif
                                    </td>
                                    <td>
                                          @if ($ex == 2)
                                                {{$d->resi}}
                                          @else
                                                {{!$d->resi}}
                                          @endif
                                    </td>
                              </tr>
                              
                        
                        
                        @endforeach
                        </tbody>
                  </table> 
            </div>
      </div>
</div>

@endsection
    
@show