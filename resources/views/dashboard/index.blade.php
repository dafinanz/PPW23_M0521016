@extends('dashboard.layouts.main')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Welcome to BarBarPet Clinic, {{auth()->user()->name}}</h4>
        </div>
    </div>
@endsection