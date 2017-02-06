<nav class="navbar navbar-toggleable-md navbar-dark elegant-color-dark">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/" target="_blank">TXKUG</a>
        <div class="collapse navbar-collapse" id="navbarNav1">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ set_active('/') }}">
                    <a href="{{ route('welcome.index') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item {{ set_active('blog') }}">
                    <a href="{{ route('blog.index') }}" class="nav-link">Blog</a>
                </li>
            </ul>


            <ul class="navbar-nav">
                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('social.redirect', ['provider' => 'slack']) }}">Slack Login</a>
                    </li>
                @else
                    @if(Auth::user()->hasRole('administrator'))

                        <li class="nav-item btn-group">
                            <a class="nav-link dropdown-toggle" id="adminDropMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                            <div class="dropdown-menu" aria-labelledby="adminDropMenu">
                                <a class="dropdown-item" href="/admin">Dashboard</a>
                                <a class="dropdown-item" href="/admin/venues">Venues</a>
                                <a class="dropdown-item" href="/admin/events">Events</a>
                                <a class="dropdown-item" href="/admin/users">Users</a>
                            </div>
                        </li>

                    @endif

                    <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle" id="userDropMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="userDropMenu">
                            <a class="dropdown-item" href="{{ route('user.events') }}">My Events</a>
                            <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                        </div>
                    </li>

                @endif

            </ul>

        </div>
    </div>
</nav>