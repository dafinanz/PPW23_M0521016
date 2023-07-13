@extends('dashboard.layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Owner</h3>

                <div class="card-tools">
                    <a class="btn btn-block btn-success" href="{{ route('owners.create') }}" role="button">Tambah data</a>
                </div>
            </div>

            <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Nomor Telepon</th>
                            <th>Alamat</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($owners as $owner)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $owner->name }}</td>
                                <td>{{ $owner->telephone }}</td>
                                <td>{{ $owner->address }}</td>
                                <td>
                                    <a class="btn btn-block btn-success" href="{{ route('owners.edit', $owner) }}" role="button">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('owners.destroy', $owner) }}">
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