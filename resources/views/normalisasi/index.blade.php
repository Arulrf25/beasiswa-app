@extends('layouts.dashboard')
@section('value')
<div class="card">
    <div class="card-header">
        <h1>Normalisasi</h1>
    </div>
    <div class="card-body">
        <div>
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
                </tr>

                @foreach($mahasiswa as $index => $item )
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->normalisasi_ipk }}</td>
                    <td>{{ $item->normalisasi_gaji_ortu }}</td>
                    <td>{{ $item->normalisasi_prestasi }}</td>
                    <td>{{ $item->normalisasi_organisasi }}</td>
                    <td>{{ $item->normalisasi_tanggungan }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
