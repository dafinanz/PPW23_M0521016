<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BarBarPet Clinic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can('isAdmin')
                <li class="nav-header">MENU ADMIN</li>
                <li class="nav-item">
                    <a href="{{ route('pets.view') }}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Daftar Pasien</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('owners.view') }}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Daftar Owner</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.view') }}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Daftar User</p>
                    </a>
                </li>
                @endcan
                
                @can('isUser')
                <li class="nav-header">MENU USER</li>
                <li class="nav-item">
                    <a href="{{ route('pets.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Registrasi</p>
                    </a>
                </li>
                @endcan
                
            </ul>
        </nav>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <button type="submit" class="btn btn-secondary btn-lg">LOG OUT</button>
                </form>
            </div>
        </div>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
