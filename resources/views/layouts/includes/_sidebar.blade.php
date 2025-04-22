<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
        </div>
        {{-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> --}}
        <div class="sidebar-brand-text mx-3">Yayasan Baiturrahman</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-solid fa-book"></i>
            <span>Layout</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Content</h6> --}}
                <a class="collapse-item" href="{{ url('admin/section-settings') }}">Slider</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Content</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Content</h6> --}}
                <a class="collapse-item" href="{{ url('/slider') }}">Slider</a>
                <a class="collapse-item" href="{{ url('/about') }}">About</a>
                <a class="collapse-item" href="{{ url('/unit') }}">Unit</a>
                <a class="collapse-item" href="{{ url('/catprog/create') }}">Program</a>
                <a class="collapse-item" href="{{ url('/structure') }}">Pengurus</a>
                <a class="collapse-item" href="{{ url('/news') }}">Berita</a>
                {{-- <a class="collapse-item" href="{{ url('/study') }}">Kajian</a> --}}
                <a class="collapse-item" href="{{ url('/admin/testimonials') }}">Testimony</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Header</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Header</h6> --}}
                <a class="collapse-item" href="#">Logo</a>
                <a class="collapse-item" href="#">Navbar</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesTwo"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-solid fa-envelope"></i>
            <span>Footer</span>
        </a>
        <div id="collapseUtilitiesTwo" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Header</h6> --}}
                <a class="collapse-item" href="#">Logo</a>
                <a class="collapse-item" href="#">Maps</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
