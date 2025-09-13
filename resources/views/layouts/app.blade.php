<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Klinik - Mini Project')</title>

    {{-- Asset lokal via Vite (Laravel UI / manual Vite setup) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.3/dist/css/coreui.min.css" rel="stylesheet"
        integrity="sha384-oMIIhJL1T5s+PxJr6+Qb0pO1IRFB6OGMM+J57UBT3UQKxSVsb++MkXpu9cLqaJxu" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">

    <style>
        .select2-selection__rendered {
            line-height: 35px !important;
        }

        .select2-container {
            width: 100% !important;

        }

        .select2-selection--single {
            height: 37px !important;
        }

        .select2-selection__arrow {
            height: 37px !important;
        }
    </style>
    {{-- Tempat injeksi style tambahan per-halaman --}}
    @stack('styles')
</head>

<body class="bg-light">

    {{-- Navbar sederhana --}}
    @include('layouts.navbar')

    <main class="container py-4">
        {{-- Flash message --}}
        @if(session('ok') || session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('ok') ?? session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <div class="fw-semibold mb-1">Terjadi kesalahan:</div>
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Konten halaman --}}
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.3/dist/js/coreui.bundle.min.js"
        integrity="sha384-SWhFOmxmv1pfTLKVBW7q8uossvuaWNeQFdmaWi6xdldiUjyqG9F6V2R2BOC8gkxx"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    @stack('scripts')
</body>

</html>