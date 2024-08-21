<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Caredge</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          @auth
              <a class="nav-link active" aria-current="page" href="/findjob">Find Job</a>
          @else
              <a class="nav-link active" aria-current="page" href="/login">Find Job</a>
          @endauth
        </li>      
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          @auth
              <a class="nav-link active" aria-current="page" href="/findcandidate">Find Candidate</a>
          @else
              <a class="nav-link active" aria-current="page" href="/login">Find Candidate</a>
          @endauth
        </li>  
      </ul>

      <form class="d-flex ms-auto" action="{{ route('search') }}" method="GET">
        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search" required>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <ul class="navbar-nav ms-auto">
        @auth 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </ul>
          </li>
        @else
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/login">Login</a>
          </li>
        </ul>
        @endauth
      </ul>
      
    </div>
  </div>
</nav>

<div class="content">
  @yield('content')
</div>