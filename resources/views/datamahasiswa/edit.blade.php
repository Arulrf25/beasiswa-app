@extends('layouts.dashboard')
@section('value')
<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <div class="text-center display-4">
                Edit Data Mahasiswa
            </div>
            <form method="POST" action="{{route('data-mahasiswa.update', $colleges->id)}}">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{$colleges->id}}">
                  <div class="mb-3">
                    <label for="" class="form-label">NIM Mahasiswa</label>
                    <input name="nim" value="{{$colleges->nim}}" type="text" class="form-control" placeholder="Masukkan NIM mahasiswa">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Nama Mahasiswa</label>
                    <input name="nama" value="{{$colleges->nama}}" type="text" class="form-control" placeholder="Masukkan nama mahasiswa">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Kelas</label>
                    <input name="kelas" value="{{$colleges->kelas}}" type="text" class="form-control" placeholder="Masukkan kelas mahasiswa">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">IPK</label>
                    <input name="ipk" value="{{$colleges->ipk}}" type="text" class="form-control" placeholder="Masukkan IPK">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Penghasilan Orangtua</label>
                    <input name="gaji_ortu" value="{{$colleges->gaji_ortu}}" type="text" class="form-control" placeholder="Masukkan penghasilan orangtua">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Prestasi</label>
                    <input name="prestasi" value="{{$colleges->prestasi}}" type="text" class="form-control" placeholder="Masukkan prestasi">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Organisasi</label>
                    <input name="organisasi" value="{{$colleges->organisasi}}" type="text" class="form-control" placeholder="Masukkan organisasi">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Jumlah Tanggungan</label>
                    <input name="tanggungan" value="{{$colleges->tanggungan}}" type="text" class="form-control" placeholder="Masukkan jumlah tanggungan">
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
