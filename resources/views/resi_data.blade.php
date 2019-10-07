@foreach($data as $i => $row)
<tr>
    <td>{{ $i+1}}</td>
    <td>{{ date_format(date_create($row->tglOrder), "D-d/M/Y") }}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->produk }}</td>
    <td>{{ $row->invoice }}</td>
    <td>{{ $row->kurir}}</td>
    <td>{{ $row->resi }}</td>
    <td >
            <div class="row">
                <div class="col-md-6 ">
                     <a class="btn btn-sm btn-info " id="white" href="{{ route('resi.show',$row->id) }}" >Lihat</a>
                 </div>
                 <br>
                 <div class="col-md-6">
                     <a class="btn btn-sm btn-success" id="white" href="{{ route('trackShow',$row->id) }}" >Track</a>        
     
                </div>
            </div>
         </td>
         
         @if ($row->flag == 0)
             <td class="text-center">
                 <span class="btn btn-sm btn-danger">Belum</span>    
             </td>
         @else
         <td class="text-center">
                 <span class="btn btn-sm btn-success">Terkirim</span>    
             </td>
         @endif
         
         
        <td>

        {{! $res = App\Resi::where('resi', $row->resi)->first() }}
        {{-- {{$inv = App\Resi::find($res)->resi}} --}}
     

       <?php
       $rajaongkir = new Steevenz\Rajaongkir('02ae756b2db51fac3f0f88fa25e92339', Steevenz\Rajaongkir::ACCOUNT_PRO);
       $config['api_key'] = '02ae756b2db51fac3f0f88fa25e92339';
       $config['account_type'] = 'pro';
       $rajaongkir = new Steevenz\Rajaongkir($config);

       $waybill = $rajaongkir->getWaybill($res->resi, $res->kurir);
            // dd($waybill);
       if ($waybill == true) {
           
           # code...
           echo " <b>{$waybill['delivery_status']['status']}</b>";
       } else {
           # code...
           echo"Resi tidak valid";
       }
       

       ?>
        
    </td>
    
    {{-- <td>{{ $row->noHp }}  </td> --}}

</tr>
@endforeach 


<tr>
    <td colspan="9" align="center">
    {!! $data->links() !!}
    </td>
</tr>

