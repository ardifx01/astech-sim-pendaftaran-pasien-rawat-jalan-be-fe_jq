@extends('layouts.app')
@section('title', 'Tambah Kunjungan')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <style>
        .input-group {
            margin-bottom: 1rem;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Tambah Kunjungan</h4>
        </div>
        <div class="card-body">
            @include('visits._form', [
                'visit' => null,
                'departments' => $departments,
                'doctors' => $doctors,
            ])
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#patient_id').select2({
                ajax: {
                    url: '{{ route('patients.select2') }}',
                    dataType: 'json',
                    delay: 250,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    }

                },
            });
            $('#poli').select2({
                data: @json($departments),
            });
            $('#dokter').select2({
                data: @json($doctors),
            });
        });

        $('#visit-form').submit(function (e) {
            let hasError = false;

            const $visit_date = $('#visit_date');
            clearError($visit_date);
            const visit_date = $visit_date.val();
            if (!visit_date) {
                setError($visit_date, 'Tanggal kunjungan wajib diisi.');
                hasError = true;
            } else {
                const today = new Date();
                const visit_date = new Date(visit_date);
                if (visit_date > today) {
                    setError($visit_date, 'Tanggal kunjungan tidak boleh di masa depan.');
                    hasError = true;
                }
            }

            const $complaint = $('#keluhan');
            clearError($complaint);
            const complaintVal = ($complaint.val() || '').trim();
            if (complaintVal.length < 5) {
                setError($complaint, 'Keluhan minimal 5 karakter.');
                hasError = true;
            }

            if (hasError) {
                e.preventDefault();
            }

        });

        function delete_visit(id) {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus kunjungan ini?',
                icon: 'warning',
            });
        }
    </script>
@endpush