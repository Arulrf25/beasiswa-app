@extends('datamahasiswa.data-mahasiswa')

@section('content')
    <table class="table-bordered table">
        <tr>
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

        @foreach($dtmahasiswa as $index => $data_mahasiswa)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $data_mahasiswa->nim }}</td>
                <td>{{ $data_mahasiswa->nama }}</td>
                <td>{{ $data_mahasiswa->kelas }}</td>
                <td>{{ $data_mahasiswa->ipk }}</td>
                <td>{{ $data_mahasiswa->gaji_ortu }}</td>
                <td>{{ $data_mahasiswa->prestasi }}</td>
                <td>{{ $data_mahasiswa->organisasi }}</td>
                <td>{{ $data_mahasiswa->tanggungan }}</td>
            </tr>
        @endforeach
    </table>
@endsection