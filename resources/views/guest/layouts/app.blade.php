<!doctype html>
<html lang="en">

@include('guest.partials.head')

<body>

@include('guest.partials.header')

<div class="container-fluid px-0 mt-5 mb-5">
    <div class="row g-0 mx-0">
        @yield('content')
    </div>
</div>

@include('guest.partials.footer')

@include('guest.partials.scripts')

</body>
</html>
