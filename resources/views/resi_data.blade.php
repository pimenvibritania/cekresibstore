@foreach($data as $i => $row)
<tr>
    <td>{{ $i+1}}</td>
    <td>{{ $row->tglOrder }}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->produk }}</td>
    <td>{{ $row->invoice }}</td>
    <td>{{ $row->resi }}</td>
    <td>{{ $row->noHp }}  </td>
    <td>
        <a class="fa fa-eye" href="{{ route('resi.show',$row->id) }}"></a>
    </td>

</tr>
@endforeach
<tr>
    <td colspan="5" align="center">
    {!! $data->links() !!}
    </td>
</tr>
