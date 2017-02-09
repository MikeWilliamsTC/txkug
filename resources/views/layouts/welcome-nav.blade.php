<nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">
            TXKUG
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('welcome.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('events.index') }}" class="nav-link">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                </li>

            </ul>

            <ul class="navbar-nav">
                @if ( ! Auth::guest())
                    <li class="nav-item dropdown btn-group">
                        <a class="nav-link dropdown-toggle" id="userDropMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="userDropMenu">
                            <a class="dropdown-item" href="{{ route('user.home') }}">My Profile</a>
                            <a class="dropdown-item" href="{{ route('user.events') }}">My Events</a>
                            <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>