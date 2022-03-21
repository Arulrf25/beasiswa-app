@extends('layouts.dashboard')
@section('value')
<a class="btn btn-primary" href="{{ route('kriteria.create') }}" title="Create a project">[+] Tambah</a>
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
          <td>{{ $item->bobot_ipk }}</td>
          <td>{{ $item->bobot_gaji_ortu }}</td>
          <td>{{ $item->bobot_prestasi }}</td>
          <td>{{ $item->bobot_organisasi }}</td>
          <td>{{ $item->bobot_tanggungan }}</td>
      </tr>
  @endforeach
</table>
</div>
@endsection
