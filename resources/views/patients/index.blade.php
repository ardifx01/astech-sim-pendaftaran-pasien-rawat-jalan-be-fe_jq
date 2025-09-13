@extends('layouts.app')

@section('title', 'Pasien')
@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Data Pasien</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('patients.create') }}" class="btn btn-primary mb-4">Tambah Pasien</a>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="patients-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Gender</th>
                                <th>Tanggal Lahir</th>
                                <th>No. HP</th>
                                <th>Alamat</th>
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
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        function delete_patient(id) {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus pasien ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('patients/') }}/" + id,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                        .done(function (response) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Pasien berhasil dihapus.',
                                icon: 'success',
                            })
                            $('#patients-table').DataTable().ajax.reload();
                        })
                        .fail(function (response) {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Pasien gagal dihapus.',
                                icon: 'error',
                            })
                        })
                }
            })
        }
        $(document).ready(function () {
            $('#patients-table').DataTable({
                processing: true,
                serverSide: true,
                scrollCollapse: true,
                ajax: {
                    url: "{{ route('patients.index') }}",
                },
                columns: [
                    { data: 'DT_RowIndex', searchable: false },
                    { data: 'name' },
                    { data: 'nik' },
                    {
                        data: 'gender', render: function (data) {
                            return data == 'L' ? 'Laki-laki' : 'Perempuan';
                        }, searchable: false
                    },
                    {
                        data: 'birth_date', render: function (data) {
                            return data ? moment(data).format('DD/MM/YYYY') : '-';
                        }, searchable: false
                    },
                    { data: 'phone' },
                    { data: 'address' },
                    { data: 'action', searchable: false }

                ],
                order: [
                    [1, 'asc']
                ],
            });

        })
    </script>
@endpush