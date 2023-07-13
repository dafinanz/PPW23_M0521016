<!DOCTYPE html>
<html lang="en">
@include('dashboard.layouts.head')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
        </div>
        @include('dashboard.layouts.navbar')
        @include('dashboard.layouts.sidebar')
        <div class="content-wrapper">
            @include('dashboard.layouts.header')
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <section class="col-12 connectedSortable">
                            @yield('content')
                        </section>
                    </div>
                </div>
            </section>
        </div>
        @include('dashboard.layouts.footer')
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    @include('dashboard.layouts.scripts')
</body>
</html>
