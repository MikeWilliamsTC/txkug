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
                <li class="nav-item {{ set_active('/') }}">
                    <a class="nav-link" href="{{ route('welcome.index') }}">Home</a>
                </li>
                <li class="nav-item {{ set_active('blog') }}">
                    <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                </li>

            </ul>

            <ul class="navbar-nav">
                @if ( ! Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.home') }}">{{ Auth::user()->name }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>