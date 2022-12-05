<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img src="{{ asset('img/logo.png') }}" alt="" width="150">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{request()->is('home') ? 'active' : ''}}">
                <a href="{{ url('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
            </li>
            <li class="menu-header">Data Master </li>
            <li class="{{request()->is('faskes') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('faskes.index') }}"><i class="fas fa-users"></i> <span>Data
                        Faskes</span>
                </a>
            </li>
            <li class="{{request()->is('pasien') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('pasien.index') }}"><i class="fas fa-project-diagram"></i>
                    <span>Data Pasien</span>
                </a>
            </li>
            <li class="{{request()->is('obat') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('obat.index') }}"><i class="fas fa-cogs"></i> <span>Data Obat</span>
                </a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            {{-- <a href="https://getstisla.com/docs" class="btn btn-danger btn-lg btn-block btn-icon-split">
                <i class="fas fa-power-off"></i> Logout
            </a> --}}
            <a class="btn btn-danger btn-lg btn-block btn-icon-split" href=" {{ route('logout') }} "
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-power-off text-light text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Logout</span>
            </a>
        </div>
    </aside>
</div>
