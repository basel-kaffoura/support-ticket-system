<!doctype html>
<html lang="en">

@include('guest.partials.head')

<body>

@include('guest.partials.header')

<div class="container-fluid px-0 mt-5 mb-5">
    <div class="row g-0 mx-0">
        <div class="container mt-4">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

@include('guest.partials.footer')

@include('guest.partials.scripts')

</body>
</html>
