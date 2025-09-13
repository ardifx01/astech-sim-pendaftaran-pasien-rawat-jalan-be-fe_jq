@extends('layouts.app')

@section('title', 'Tambah Pasien')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Tambah Pasien</h2>
        </div>
        <div class="card-body">
            @include('patients.form', [
                'action' => route('patients.store'),
                'method' => 'POST',
                'submitText' => 'Tambah',
                'patient' => null
            ])
                    </div>
                </div>
@endsection
