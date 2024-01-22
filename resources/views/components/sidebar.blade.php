<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('politeknik.jpg') }}" alt="Your Logo" width="50"> <p>
            <a href="{{ url('dashboard-general-dashboard') }}">Sarpras</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('dashboard-general-dashboard') }}">PNJ</a>
        </div>

        {{-- dropdown admin --}}
        @if(auth()->user()->role == 'admin')
<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fire"></i><span>Dashboard Admin</span>
        </a>
        <ul class="dropdown-menu">
            <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ url('dashboard-general-dashboard') }}">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class='{{ Request::is('barang') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ url('barang') }}">
                    <i class="fas fa-box"></i> Barang
                </a>
            </li>
            <li class='{{ Request::is('peminjaman') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ url('peminjaman') }}">
                    <i class="fas fa-history"></i> History
                </a>
            </li>
            <li class='{{ Request::is('user') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ url('user') }}">
                    <i class="fas fa-user-cog"></i> User
                </a>
            </li>
            <li class='{{ Request::is('chart') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ url('chart') }}">
                    <i class="fas fa-chart-bar"></i> Grafik
                </a>
            </li>
        </ul>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-flag"></i><span>Report</span>
            </a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('bugreportadmin') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('bugreportadmin') }}">
                        <i class="fas fa-bug"></i>Bug Report
                    </a>
                </li>
            </ul>
        </li>
@endif

{{-- mahasiswa --}}
                @if(auth()->user()->role == 'mahasiswa')
                <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard Mahasiswa</span></a>
                        <ul class="dropdown-menu">
                            <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                                <a class="nav-link" href="{{ url('dashboard-general-dashboard') }}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class='{{ Request::is('baranguser') ? 'active' : '' }}'>
                                <a class="nav-link" href="{{ url('baranguser') }}">
                                    <i class="fas fa-box"></i>List Barang</a>
                            </li>
                            <li class='{{ Request::is('history') ? 'active' : '' }}'>
                                <a class="nav-link" href="{{ url('history') }}">
                                    <i class="fas fa-history"></i>History</a>
                            </li>
                        </ul>
                        <li class="nav-item dropdown" >
                            <a href="#"
                                class="nav-link has-dropdown"><i class="fas fa-question"></i> <span>Pusat Bantuan</span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{ Request::is('faq') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ url('frequently-asked-question') }}">
                                        <i class="fas fa-circle-question"></i>F.A.Q</a>
                                    </li>
                                </ul>
                                <ul class="dropdown-menu">
                                    <li class="{{ Request::is('kridaran') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ url('kridaran') }}">
                                            <i class="fas fa-file-pen"></i>Kritik Dan Saran</a>
                                    </li>
                                </ul>
                            <ul class="dropdown-menu">
                                <li class="{{ Request::is('forms-validation') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('bugreport') }}">
                                    <i class="fas fa-bug"></i>Bug Report</a>
                                </li>
                            </ul>
                        </li>
                        {{-- End Report dropdown inside Dashboard Admin --}}
                    </li>
                </ul>
                @endif

                <div class="hide-sidebar-mini mt-3 mb-3 p-5">
                    <form action="logout" method="POST">
                        @csrf
                    </form>
                </div>
            </aside>
        </div>
        {{-- <button class="noselect">
        <span class="text">Darkmode</span><span class="icon"><svg fill="#000000" width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 9.875v12.219c0 1.125 0.469 2.125 1.219 2.906 0.75 0.75 1.719 1.156 2.844 1.156h6.125v-2.531h-6.125c-0.844 0-1.5-0.688-1.5-1.531v-12.219c0-0.844 0.656-1.5 1.5-1.5h6.125v-2.563h-6.125c-1.125 0-2.094 0.438-2.844 1.188-0.75 0.781-1.219 1.75-1.219 2.875zM6.719 13.563v4.875c0 0.563 0.5 1.031 1.063 1.031h5.656v3.844c0 0.344 0.188 0.625 0.5 0.781 0.125 0.031 0.25 0.031 0.313 0.031 0.219 0 0.406-0.063 0.563-0.219l7.344-7.344c0.344-0.281 0.313-0.844 0-1.156l-7.344-7.313c-0.438-0.469-1.375-0.188-1.375 0.563v3.875h-5.656c-0.563 0-1.063 0.469-1.063 1.031z"></path>
        </syg></span>
    </button> --}}
