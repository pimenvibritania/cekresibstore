@foreach($data as $i => $row)
<tr>
    <td>{{ $i+1}}</td>
    <td>{{ date_format(date_create($row->tglOrder), "D-d/M/Y") }}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->produk }}</td>
    <td>{{ $row->invoice }}</td>
    <td>{{ $row->kurir}}</td>
    <td>{{ $row->resi }}</td>
    
    {{-- <td>{{ $row->noHp }}  </td> --}}
    <td>
       <div class="row">
           <div class="col-md-6 ">
                <a class="btn btn-info " id="white" href="{{ route('resi.show',$row->id) }}" >Lihat</a>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success" id="white" href="{{ route('trackShow',$row->id) }}" >Track</a>        

           </div>
       </div>
    </td>
    @if ($row->flag == 0)
        <td class="text-center">
            <span class="btn btn-danger">Belum</span>    
        </td>
    @else
    <td class="text-center">
            <span class="btn btn-success">Terkirim</span>    
        </td>
    @endif

</tr>
@endforeach 


<tr>
    <td colspan="9" align="center">
    {!! $data->links() !!}
    </td>
</tr>

