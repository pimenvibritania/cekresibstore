@foreach($data as $i => $row)
<tr>
    <td>{{ $i+1}}</td>
    <td>{{ date_format(date_create($row->tglOrder), "d-M-Y") }}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->produk }}</td>
    <td>{{ $row->invoice }}</td>
    <td>{{ $row->kurir}}</td>
    <td>{{ $row->resi }}</td>
    <td>{{ $row->noHp }}  </td>
    <td>
        <a class="btn btn-info" id="white" href="{{ route('resi.show',$row->id) }}">Lihat</a>
    </td>

</tr>
@endforeach 


<tr>
    <td colspan="9" align="center">
    {!! $data->links() !!}
    </td>
</tr>
