<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link d-flex align-items-center">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
            </span>
            <span class=" demo menu-text fw-bolder ms-2">Al-Fath</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>


        <!-- Metode SAW -->
        <li class="menu-item {{ request()->routeIs('admin.saw') ? 'active' : '' }}">
            <a href="{{ route('admin.saw') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calculator"></i>
                <div data-i18n="Metode SAW">Metode SAW</div>
            </a>
        </li>

        <!-- Santri -->
        <li class="menu-item {{ request()->routeIs('admin.santri.index') ? 'active' : '' }}">
            <a href="{{ route('admin.santri.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Santri">Santri</div>
            </a>
        </li>

        <!-- Criteria -->
        <li class="menu-item {{ request()->routeIs('admin.criteria.index') ? 'active' : '' }}">
            <a href="{{ route('admin.criteria.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <div data-i18n="Criteria">Criteria</div>
            </a>
        </li>

        <!-- Penilaian -->
        <li class="menu-item {{ request()->routeIs('admin.penilaian.index') ? 'active' : '' }}">
            <a href="{{ route('admin.penilaian.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                <div data-i18n="Penilaian">Penilaian</div>
            </a>
        </li>

        <!-- Normalisasi -->
        <li class="menu-item {{ request()->routeIs('admin.normalisasi.index') ? 'active' : '' }}">
            <a href="{{ route('admin.normalisasi.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bar-chart-alt"></i>
                <div data-i18n="Normalisasi">Normalisasi</div>
            </a>
        </li>
<!-- Nilai Akhir -->
<li class="menu-item {{ request()->routeIs('admin.hasil.index') ? 'active' : '' }}">
    <a href="{{ route('admin.hasil.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
        <div data-i18n="Nilai Akhir">Nilai Akhir</div>
    </a>
</li>

<!-- Perengkingan -->
<li class="menu-item {{ request()->routeIs('admin.hasil.top_ranking') ? 'active' : '' }}">
    <a href="{{ route('admin.hasil.top_ranking') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-medal"></i>
        <div data-i18n="Perengkingan">Perengkingan</div>
    </a>
</li>

<!-- User Management -->
<li class="menu-item {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
    <a href="{{ route('admin.users.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="User">User</div>
    </a>
</li>
    </ul>
    <div class="col-sm-5 text-center text-sm-left">
        <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{ asset('assets/img/illustrations/girl-doing-yoga-light.png') }}" height="140"
                alt="Ilustrasi Pengguna" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png" />
        </div>
    </div>

</aside>
