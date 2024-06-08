<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Social Network</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navb">
        <form class="form-inline mr-auto mx-auto">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-success my-2 my-sm-0" type="button">Search</button>
        </form>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        </ul>
    </div>
</nav>
