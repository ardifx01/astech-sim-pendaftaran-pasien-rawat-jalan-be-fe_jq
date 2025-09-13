@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Pasien</h2>
        </div>
        <div class="card-body">
            @include('patients.form', [
                'action' => route('patients.update', $patient),
                'method' => 'PUT',
                'submitText' => 'Update',
                'patient' => $patient
            ])
                    </div>
                </div>
@endsection
