@extends('dashboard.layouts.main')
@section('content')
<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Registrasi</h3>
    </div>

    <form method="POST" action="{{ route('pets.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <input type="hidden" class="form-control" name="user_id" value="{{ $user_id }}">
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" placeholder="Masukkan nama peliharaan" required>
            </div>
            <div class="form-group">
                <label for="species">Jenis Hewan</label>
                <input type="text" class="form-control" name="species" placeholder="Masukkan jenis hewan" required>
            </div>
            <div class="form-group">
                <label for="disease">Penyakit</label>
                <input type="text" class="form-control" name="disease" placeholder="Masukkan keluhan penyakit" required>
            </div>
            <div class="form-group">
                <label for="appointment">Tanggal berobat</label>
                <input type="date" class="form-control" name="appointment" placeholder="Masukkan tanggal berobat" required>
            </div>
            <div class="form-group">
                <label for="owner_id">Pemilik</label>
                <select class="form-control" name="owner_id" required>
                    <option value="">-- Pilih Pemilik --</option>
                    @foreach($owners as $owner)
                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>    
</div>
@endsection
                       