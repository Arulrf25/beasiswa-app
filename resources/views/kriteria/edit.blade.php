@extends('layouts.dashboard')
@section('value')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Kriteria</h2>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('kriteria.update', $data_kriteria->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kriteria</strong>
                <input type="text" name="nama_kriteria" value="{{ $data_kriteria->nama_kriteria }}" class="form-control" placeholder="Name">
                <input type="text" name="id" value="{{ $data_kriteria->id }}" hidden>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Atribut</strong>
                <input type="text" name="attribut" value="{{ $data_kriteria->attribut }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bobot</strong>
                <input type="text" name="bobot" class="form-control" placeholder="{{ $data_kriteria->bobot }}"
                    value="{{ $data_kriteria->bobot }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Simpan</button>
            <a class="btn btn-secondary" href="{{ route('kriteria.index') }}" title="Go back"> <i
                    class="fas fa-backward "></i> Kembali</a>
        </div>
    </div>

</form>
@endsection
