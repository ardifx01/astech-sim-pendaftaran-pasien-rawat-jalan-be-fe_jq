<nav class="navbar  navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid ">
        <a class="navbar-brand pr-32" href="#">SIM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('patient*') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('patients.index') }}">Pasien</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('visits*') ? 'active' : '' }}" href="#"
                        role="button" data-coreui-toggle="dropdown" aria-expanded="false">
                        Data Kunjungan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item a" href="{{ route('visits.index') }}">Data Kunjungan</a></li>
                        <li><a class="dropdown-item" href="{{ route('visits.create') }}">Pendaftaran Kunjungan</a></li>
                    </ul>
                </li>

            </div>
        </div>
    </div>
</nav>