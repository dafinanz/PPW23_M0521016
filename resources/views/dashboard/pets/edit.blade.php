@extends('dashboard.layouts.main')
@section('content')
<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Edit</h3>
    </div>

    <form method="POST" action="{{ route('pets.update', $pet->id) }}">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" value="{{ $pet->name }}" required>
            </div>
            <div class="form-group">
                <label for="species">Jenis Hewan</label>
                <input type="text" class="form-control" name="species" value="{{ $pet->species }}" required>
            </div>
            <div class="form-group">
                <label for="disease">Penyakit</label>
                <input type="text" class="form-control" name="disease" value="{{ $pet->disease }}" required>
            </div>
            <div class="form-group">
                <label for="appointment">Tanggal berobat</label>
                <input type="date" class="form-control" name="appointment" value="{{ $pet->appointment }}" required>
            </div>
        </div>
                    
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
                       