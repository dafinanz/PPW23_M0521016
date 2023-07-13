<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <body class="hold-transition @yield('auth-type')">
        @yield('contents')
        @include('layouts.scripts')
    </body>
</html>
