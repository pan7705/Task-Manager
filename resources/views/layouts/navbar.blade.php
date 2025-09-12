<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('task.index') }}">Task Manager</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        @else
            <li class="nav-item">
              <span class="nav-link">Hi, {{ Auth::user()->name }}</span>
            </li>
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="btn btn-link nav-link" style="display:inline; cursor:pointer;">
                      Logout
                  </button>
              </form>
            </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
