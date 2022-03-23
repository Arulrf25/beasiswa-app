@extends('layouts.dashboard')
@section('value')
<div class="card">
    <div class="card-header">
        <h1>Data Mahasiswa</h1>
    </div>
    <div class="card-body">
        <div>
            <button type="button" class="btn btn-primary fas fa-plus-square" data-toggle="modal"
                data-target="#exampleModal">
                Tambah Data
            </button>
            <table class="table table-striped table-responsive mt-3" style="vertical-align: middle">
                <thead>
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
                </thead>
                <tbody>
                    @foreach($colleges as $college)
                    <tr>
                        <td> {{ $loop->index+1}} </td>
                        <td>{{ $college->nim }}</td>
                        <td>{{ $college->nama }}</td>
                        <td>{{ $college->kelas }}</td>
                        <td>{{ $college->ipk }}</td>
                        <td>{{ $college->gaji_ortu }}</td>
                        <td>{{ $college->prestasi }}</td>
                        <td>{{ $college->organisasi }}</td>
                        <td>{{ $college->tanggungan }}</td>
                        <td>
                            <form action="{{route('data-mahasiswa.destroy', $college->id)}}" method="POST">
                                <a href="{{route('data-mahasiswa.edit', $college->id)}}"
                                    class="btn btn-primary fas fa-edit"></a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger fas fa-trash-alt"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Form tambah data mahasiswa --}}
                <form action="{{route('data-mahasiswa.store')}}" method="POST">
                    {{-- CSRF merupakan keamanan yang disediakan laravel --}}
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">NIM Mahasiswa</label>
                        <input required name="nim" type="text" class="form-control"
                            placeholder="Masukkan NIM mahasiswa">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Mahasiswa</label>
                        <input required name="nama" type="text" class="form-control"
                            placeholder="Masukkan nama mahasiswa">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kelas</label>
                        <input required name="kelas" type="text" class="form-control"
                            placeholder="Masukkan kelas mahasiswa">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">IPK</label>
                        <select required name="ipk" class="custom-select">
                            <option style="display: none">IPK Mahasiswa</option>
                            <option value="<= 2.75">
                                <= 2.75</option>
                            <option value="<= 3.00">
                                <= 3.00</option>
                            <option value="<= 3.25">
                                <= 3.25</option>
                            <option value="<= 3.50">
                                <= 3.50</option>
                            <option value="> 3.50">> 3.50</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Penghasilan Orangtua</label>
                        <select required name="gaji_ortu" class="custom-select">
                            <option style="display: none">Penghasilan Orangtua</option>
                            <option value="<= 1.000.000">
                                <= 1.000.000</option>
                            <option value="<= 5.000.000">
                                <= 5.000.000</option>
                            <option value="<= 10.000.000">
                                <= 10.000.000</option>
                            <option value="> 10.000.000"> > 10.000.000</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Prestasi</label>
                        <select required name="prestasi" class="custom-select">
                            <option style="display: none">Prestasi</option>
                            <option value="Ada">Ada</option>
                            <option value="Tidak Ada">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Organisasi</label>
                        <select required name="organisasi" class="custom-select">
                            <option style="display: none">Organisasi</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jumlah Tanggungan</label>
                        <select required name="tanggungan" class="custom-select">
                            <option style="display: none">Jumlah Tanggungan</option>
                            <option value="1 anak">1 anak</option>
                            <option value="2 anak">2 anak</option>
                            <option value="3 anak">3 anak</option>
                            <option value="4 anak">4 anak</option>
                            <option value=">= 5 anak">>= 5 anak</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
