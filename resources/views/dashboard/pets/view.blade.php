@extends('dashboard.layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pasien</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peliharaan</th>
                            <th>Nama Pemilik</th>
                            <th>Jenis Hewan</th>
                            <th>Penyakit</th>
                            <th>Tanggal Berobat</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pets as $pet)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $pet->pet_name }}</td>
                                    <td>{{ $pet->owner_name }}</td>
                                    <td>{{ $pet->species }}</td>
                                    <td>{{ $pet->disease }}</td>
                                    <td>{{ $pet->appointment }}</td>
                                    <td>
                                        <a class="btn btn-block btn-success" href="{{ route('pets.edit', $pet->id) }}" role="button">Edit</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('pets.destroy', $pet->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-block btn-danger">Delete</button>
                                        </form>
                                    </td>                                    
                                </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection