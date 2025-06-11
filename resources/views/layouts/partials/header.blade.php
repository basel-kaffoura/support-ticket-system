<!-- Header Start -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand custom-brand" href="#">Support Tickets System</a>

        @guest
            @if (!request()->is('login'))
                <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
            @else
                <a href="{{ route('tickets.create') }}" class="btn btn-outline-light">Add Ticket</a>
            @endif
        @endguest

        @auth
            @if (request()->is('tickets/create'))
                <a href="{{ route('dashboard') }}" class="btn btn-outline-light">Dashboard</a>
            @else
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Logout</button>
                </form>
            @endif
        @endauth
    </div>
</nav>
<!-- Header End -->
