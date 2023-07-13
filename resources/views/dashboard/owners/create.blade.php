@extends('dashboard.layouts.main')
@section('content')
<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Registrasi</h3>
    </div>

    <form method="POST" action="{{ route('owners.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <input type="hidden" class="form-control" name="user_id" value="{{ $user_id }}">
            </div>
            <div class="form-group">
                <label for="name">Nama lengkap</label>
                <input type="text" class="form-control" name="name" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="form-group">
                <label for="telephone">Nomor telepon</label>
                <input type="text" class="form-control" name="telephone" placeholder="Masukkan no telp" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" name="address" placeholder="Masukkan alamat" required>
            </div>
        </div>
                    
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
                       