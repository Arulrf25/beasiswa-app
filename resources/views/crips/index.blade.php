@extends('layouts.dashboard')
@section('value')
<a class="btn btn-success" href="{{ route('create.crips', $kriteria->id) }}" title="Create a project"> <i class="fas fa-plus-circle"></i></a>
<a class="btn btn-primary" href="{{ route('kriteria.index', ) }}" title="Go back">Kembali</a>
<table class="table table-striped table-hover" style="vertical-align: middle">
  <tr>
      <th>No.</th>
      <th>Nama Crips</th>
      <th>Bobot</th>
      <th>Aksi</th>
  </tr>

  @foreach($data_crips as $index => $item )
      <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>{{ $item->nama_crips }}</td>
          <td>{{ $item->bobot }}</td>
          <td>
            <form action="{{ route('crips.destroy', $item->id) }}" method="POST">
                {{-- <a href="{{ route('crips.show', $item->id) }}" title="show" class="btn btn-primary fas fa-eye"></a> --}}
                <a href="{{ route('crips.edit', $item->id) }}" class="btn btn-primary fas fa-edit"></a>
                @csrf
                @method('DELETE')
                <button type="submit" title="delete" class="btn btn-danger fas fa-trash-alt"> </button>
            </form>
          </td>
      </tr>

  @endforeach
</table>
@endsection
