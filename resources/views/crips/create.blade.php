@extends('layouts.dashboard')
@section('value')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Crips Baru</h2>
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
<form action="{{ route('crips.store') }}" method="POST" >
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Crips</strong>
                <input type="text" name="kriteria_id" class="form-control" value="{{ $id }}" hidden>
                <input type="text" name="nama_crips" class="form-control" placeholder="Nama Crips">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bobot</strong>
                <input type="text" name="bobot" class="form-control" placeholder="Bobot">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="{{ route('kriteria.show', $id) }}" title="Go back">Kembali</a>
        </div>
    </div>

</form>
@endsection
