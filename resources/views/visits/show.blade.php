@extends('layouts.app')

@section('title', 'Pasien')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title" id="title">Riwayat Data Kunjungan Pasien {{ $visit->patient->name }}</h4>
        </div>
        <div class="card-body">
            <div class="row mb-4 align-items-end">
                <div class="col-md-6 justify-content-center">
                    <a href="{{ route('patients.edit', $visit->patient_id) }}" class="btn btn-warning">Edit Pasien</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Data Pasien
                                </div>
                                <div class="card-body">
                                    @include('patients.form', [
                                    'action' => null,
                                    'method' => null,
                                    'submitText' => null,
                                    'patient' => $visit->patient
                                ])
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Data Kunjungan
                                </div>
                                <div class="card-body">

                                    @include('visits._form', [
                                        'visit' => $visit
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
