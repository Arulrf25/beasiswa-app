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

<form action="{{ route('crips.update', $data_crips->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Crips</strong>
                <input type="text" name="kriteria_id" value="{{ $data_crips->kriteria_id }}" hidden>
                <input type="text" name="nama_crips" value="{{ $data_crips->nama_crips }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bobot</strong>
                <input type="text" name="bobot" class="form-control" placeholder="{{ $data_crips->bobot }}"
                    value="{{ $data_crips->bobot }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="{{ route('kriteria.show', $data_crips->kriteria_id ) }}" title="Go back"> <i
                    class="fas fa-backward "></i> </a>
        </div>
    </div>

</form>
@endsection
