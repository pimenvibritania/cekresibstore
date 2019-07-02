<table>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal Order</th>
            <th scope="col">Invoice</th>
            <th scope="col">Kurir</th>
            <th scope="col">Nama</th>
            <th scope="col">No Hp</th>
            <th scope="col">Product</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Kota</th>
            <th scope="col">Kecamatan</th>
            <th scope="col">Alamat</th>
            <th scope="col">Resi</th>
            <th scope="col">Email Reseller</th>
            <th scope="col">Nama Reseller</th>


        </tr> 
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($resis as $resi)
        <tr>
            <td>{{ $no++}}</td>
            <td>{{ date_format(date_create($resi->tglOrder), "m/d/Y") }}</td>
            <td>{{ $resi->invoice }}</td>
            <td>{{ $resi->kurir}}</td>
            <td>{{ $resi->nama }}</td>
            <td>{{ $resi->noHp }}</td>
            <td>{{ $resi->produk }}</td>
            <td>{{ $resi->provinsi }}  </td>
            <td>{{ $resi->kota }}  </td>
            <td>{{ $resi->kecamatan }}  </td>
            <td>{{ $resi->alamat }}  </td>
            <td>{{ $resi->resi }}  </td>
            <td>{{ $resi->email_reseller}}</td>
            <td>{{ $resi->nama_reseller}}</td>
        </tr>
    @endforeach
    </tbody>
</table>