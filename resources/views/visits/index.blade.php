@extends('layouts.app')

@section('title', 'Pasien')
@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title" id="title">Data Kunjungan Semua Pasien</h4>
        </div>
        <div class="card-body">
            <div class="row mb-4 align-items-end">
                <div class="col-md-6 justify-content-center">
                    <label for="gender">Nama Pasien</label>
                    <div class="input-group">
                        <select name="nama-pasien" id="nama_pasien" class="form-control">
                        </select>
                    </div>
                </div>

                <div class="col-md-6 justify-content-center">
                    <a href="{{ route('visits.create') }}" class="btn btn-primary">Pendaftaran Kunjungan</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered" id="visits-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Poli</th>
                                <th>Dokter</th>
                                <th>Keluhan</th>
                                <th style="width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/locale/id.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            moment.locale('id'); // set default ke Indonesia
            let nama_pasien = null;
            $('#nama_pasien').select2({
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

            $('#nama_pasien').on('select2:select', function (e) {
                nama_pasien = e.params.data.id;
                $('#title').text('Data Kunjungan Pasien ' + e.params.data.text);
                $('#visits-table').DataTable().ajax.reload();
            });

            $('#visits-table').DataTable({
                processing: true,
                serverSide: true,
                scrollCollapse: true,
                ajax: {
                    url: "{{ route('visits.get_visits') }}",
                    data: function (d) {
                        d.patient_id = nama_pasien;
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', searchable: false },
                    {
                        data: 'visit_date', render: function (data) {
                            return data ? moment(data).format('dddd, DD MMMM YYYY') : '-';
                        }, searchable: false
                    },
                    { data: 'department' },
                    { data: 'doctor_name' },
                    {
                        data: 'complaint', render: function (data) {
                            if (data.length > 15) {
                                return data.substring(0, 15) + '...';
                            } else {
                                return data;
                            }
                        }
                    },
                    { data: 'action' }

                ],
                order: [
                    [1, 'desc']
                ],
            });
        })

    </script>
@endpush