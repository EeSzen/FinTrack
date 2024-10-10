<!-- header -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield(
    'title') | FinTrack</title>

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- public connect css -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css'); }}"/>
  </head>

  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg ">
      <div class="container-test d-flex align-items-end w-100">
            <!-- logo -->
            <div class="d-flex justify-content-center align-items-center">
              <nav class="navbar navbar-expand-lg">
                <div class="container-test">
                  <a class='navbar-brand m-3 text-light' href='/'>
                    FinTrack
                  </a>
                </div>
              </nav>
            </div>
            <button
              class="navbar-toggler ms-auto m-3"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a aria-current='page' class='nav-link text-light' href='/'>Home</a
                  >
                </li>
                @guest
                <li class="nav-item">
                  <a aria-current='page' class='nav-link text-light' href='/signup'>Login</a
                  >
                </li>
                <li class="nav-item">
                  <a aria-current='page' class='nav-link text-light me-3' href='/signup'>Sign Up</a
                  >
                </li>
                @else
                @if(auth()->user()->role_id === 1 || auth()->user()->role_id === 2 )
                <li class="nav-item">
                    <a aria-current='page' class='nav-link text-light' href='/super_admin'>Manage Users</a>
                  </li>
                @endif
                <li class="nav-item">
                    <a aria-current='page' class='nav-link text-light' href='/budgets'>My Budget</a>
                  </li>
                <li class="nav-item">
                    <a aria-current='page' class='nav-link text-light' href='/expenses'>Expenses</a>
                  </li>
                <li class="nav-item">
                  <a aria-current='page' class='nav-link text-danger me-3' href='/logout'>Logout</a
                  >
                </li>
                @endguest
              </ul>
            </div>
          </div>
        </nav>
    
 <!-- header end -->

@yield('content')

<!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<!-- footer end -->