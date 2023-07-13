@extends('dashboard.layouts.main')
@section('content')
<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Edit</h3>
    </div>

    <form method="POST" action="{{ route('owners.update', $owner) }}">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama lengkap</label>
                <input type="text" class="form-control" name="name" value="{{ $owner->name }}" required>
            </div>
            <div class="form-group">
                <label for="telephone">Nomor telepon</label>
                <input type="text" class="form-control" name="telephone" value="{{ $owner->telephone }}" required>
            </div>
            <div class="form-group">
                <label for="owner">Alamat</label>
                <input type="text" class="form-control" name="address" value="{{ $owner->address }}" required>
            </div>
        </div>
                    
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
                       