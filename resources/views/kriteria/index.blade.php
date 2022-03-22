@extends('layouts.dashboard')
@section('value')
<div class="card">
    <div class="card-header"><h1>Kriteria</h1></div>
    <div class="card-body">
        <a class="btn btn-primary" href="{{ route('kriteria.create') }}" title="Create a project"><i class="fas fa-plus-square"> Tambah</i></a>
        <div>
            <table class="table table-striped table-hover mt-2" style="vertical-align: middle">
                <tr>
                    <th>No.</th>
                    <th>Kriteria</th>
                    <th>Attribute</th>
                    <th>Bobot</th>
                    <th>Aksi</th>
                </tr>

                @foreach($data_kriteria as $index => $item )
                <tr>
                    {{-- <td>{{ $loop->index + 1 }}</td> --}}
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_kriteria }}</td>
                    <td>{{ $item->attribut }}</td>
                    <td>{{ $item->bobot }}</td>
                    <td>
                        <form action="{{ route('kriteria.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('kriteria.show', $item->id) }}" title="show"
                                class="btn btn-primary fas fa-eye"></a>
                            <a href="{{ route('kriteria.edit', $item->id) }}" class="btn btn-primary fas fa-edit"></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="delete" class="btn btn-danger fas fa-trash-alt"> </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
