<table>
      <thead>
            <tr>
                  <th>
                        Resi
                  </th>
                  <th>
                        status
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
                      <b> aktif</b>
                      {{$d->nama}}
                  @else
                      {{!$d->nama}}
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

<table>
            <thead>
                  <tr>
                        <th>
                              Resi
                        </th>
                        <th>
                              status
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
                            <b>mati</b>
                            {{$d->nama}}
                        @else
                            {{!$d->nama}}
                        @endif
                  </td>
                 
            </tr>
            
      
      
      @endforeach
      </tbody>
      </table>