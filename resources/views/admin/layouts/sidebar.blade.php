<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon">
            <img src="" alt="" width="65px">
        </div>
        <div class="sidebar-brand-text">SEHAT SELALU</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::path() == 'dashboard' ? 'active' : ' ' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Fitur
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::path() == 'karyawan' ? 'active' : ' ' }}">
        <a class="nav-link collapsed" href="/karyawan">
            <i class="fas fa-list-alt"></i>
            <span>Karyawan</span>
        </a>
    </li>
    <li class="nav-item {{ Request::path() == 'obats' ? 'active' : ' ' }}">
        <a class="nav-link collapsed" href="/obats">
            <i class="fas fa-list-alt"></i>
            <span>obat</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Request::path() == 'konsultasis' ? 'active' : ' ' }}">
        <a class="nav-link collapsed" href="/konsultasis">
            <i class="fas fa-ticket-alt"></i>
            <span>konsultasi</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Request::path() == 'dokters' ? 'active' : ' ' }}">
        <a class="nav-link collapsed" href="/dokters">
            <i class="fas fa-clock"></i>
            <span>dokter</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Request::path() == 'transaksi' ? 'active' : ' ' }}">
        <a class="nav-link collapsed" href="/transaksi">
            <i class="fas fa-clock"></i>
            <span>Laporan transaksi</span>
        </a>
    </li>
    <li class="nav-item {{ Request::path() == 'laporanobat' ? 'active' : ' ' }}">
        <a class="nav-link collapsed" href="/laporanobat">
            <i class="fas fa-clock"></i>
            <span>Laporan Obat</span>
        </a>
    </li>
    <li class="nav-item {{ Request::path() == 'laporan' ? 'active' : ' ' }}">
        <a class="nav-link collapsed" href="/laporan">
            <i class="fas fa-ticket-alt"></i>
            <span>Laporan Pasien</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="">
                <form action="{{ url('logout') }}" method="post">
                    @csrf
                    {{-- <h6 class="collapse-header">Login Screens:</h6> --}}
                    <button type="submit" class="btn btn-primary"><i
                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</button>
                    {{-- <a class="collapse-item" href="login">Logout</a> --}}
                </form>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
