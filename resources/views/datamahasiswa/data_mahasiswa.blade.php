@extends('layouts.dashboard')
@section('value')
<table class="table table-striped table-hover" style="vertical-align: middle">
    <tr>
        <th>No.</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>IPK</th>
        <th>Gaji Ortu</th>
        <th>Prestasi</th>
        <th>Organisasi</th>
        <th>Jumlah Tanggungan</th>
        <th>Aksi</th>
    </tr>

    @foreach($colleges as $college)
        <tr>
            <td>{{ $college->id }}</td>
            <td>{{ $college->nim }}</td>
            <td>{{ $college->nama }}</td>
            <td>{{ $college->kelas }}</td>
            <td>{{ $college->ipk }}</td>
            <td>{{ $college->gaji_ortu }}</td>
            <td>{{ $college->prestasi }}</td>
            <td>{{ $college->organisasi }}</td>
            <td>{{ $college->tanggungan }}</td>
            <td>
                <a href="{{route('data_mahasiswa.destroy', $college->id)}} " class="btn btn-primary fas fa-edit"></a>
                <form action="{{route('data_mahasiswa.destroy', $college->id)}}" method="POST">
                    @crsf
                    @method('delete')
                    <button class="btn btn-danger fas fa-trash-alt"></button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection

