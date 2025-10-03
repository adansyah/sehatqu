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
    <li class="nav-item">
        <a class="nav-link" href="/doctor/dashboard">
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


    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="/doctor/resep">
            <i class="fas fa-ticket-alt"></i>
            <span>Resep</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="/doctor/laporan">
            <i class="fas fa-ticket-alt"></i>
            <span>Laporan Pasien</span>
        </a>
    </li>


    <li class="nav-item">

        <a class="nav-link collapsed">
            <div class="">
                <form action="{{ url('logoutDokter') }}" method="post">
                    @csrf
                    {{-- <h6 class="collapse-header">Login Screens:</h6> --}}
                    <button type="submit" class="btn btn-primary"><i
                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</button>
                    {{-- <a class="collapse-item" href="login">Logout</a> --}}
                </form>
            </div>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
