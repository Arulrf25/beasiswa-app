@extends('layouts.dashboard')
@section('value')
<div class="card">
    <div class="card-header">
        <h1>Perangkingan</h1>
    </div>
    <div class="card-body">
        <div>
            <table class="table table-striped table-responsive" style="vertical-align: middle">
                <thead>
                    <tr class="text-center">
                        <td colspan="">Rank</td>
                        <td colspan="">NIM</td>
                        <td colspan="">Nama</td>
                        <td colspan="1">Total Bobot</td>
                        <td colspan="2">IPK</td>
                        <td colspan="2">Gaji</td>
                        <td colspan="2">Prestasi</td>
                        <td colspan="2">Organisasi</td>
                        <td colspan="2">Tanggungan Orang Tua</td>
                    </tr>

                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>normalisasi</th>
                        <th>bobot</th>
                        <th>normalisasi</th>
                        <th>bobot</th>
                        <th>normalisasi</th>
                        <th>bobot</th>
                        <th>normalisasi</th>
                        <th>bobot</th>
                        <th>normalisasi</th>
                        <th>bobot</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_finish as $item )
                        <tr>
                            <td>{{ $loop->index+1}}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->total_bobot }}</td>
                            <td>{{ $item->normalisasi_ipk }}</td>
                            <td>{{ $item->bobot_ipk }}</td>
                            <td>{{ $item->normalisasi_gaji }}</td>
                            <td>{{ $item->bobot_gaji }}</td>
                            <td>{{ $item->normalisasi_prestasi }}</td>
                            <td>{{ $item->bobot_prestasi }}</td>
                            <td>{{ $item->normalisasi_organisasi }}</td>
                            <td>{{ $item->bobot_organisasi }}</td>
                            <td>{{ $item->normalisasi_tanggungan }}</td>
                            <td>{{ $item->bobot_tanggungan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
