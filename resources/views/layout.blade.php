<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <!-- font awsome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"  />
        <link rel="stylesheet" href="./css/app.css" />
    </head>
    <body>
        <!-- NAVBAR STARTS -->
        <nav class="navbar navbar-expand-lg nav-style fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                <i class="fa fa-bars"style="color:black ; font-size:26px" ></i>
                </button>
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                aria-current="page"
                                href="/"
                                >Home</a
                            >
                        </li>
                        <!-- <li class="nav-item">
              <a class="nav-link" href="">Link</a>
            </li> -->
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @if (Route::has('login'))
                        <li class="nav-item">
                            @auth
                            <a class="nav-link" href="{{ url('/dashboard') }}"
                                >Dashboard</a
                            >
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"
                                >Log In</a
                            >
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"
                                >Register</a
                            >
                        </li>
                        @endif @endauth @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAVBAR ENDS -->
        @yield('content')
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
