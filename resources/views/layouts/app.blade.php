<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gabutnya Sepuh')</title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Font: Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    
    <style>
        /* Base Dark Theme */
        body {
            background-color: #0d0d0d;
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        /* Navbar Customization */
        .navbar {
            background-color: rgba(13, 13, 13, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #333;
        }
        .navbar-brand {
            font-weight: 900;
            color: #fff !important;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .nav-link {
            color: #a0a0a0 !important;
            font-weight: 700;
            font-size: 0.9rem;
            transition: all 0.3s ease-in-out;
            margin: 0 10px;
        }
        
        /* Efek Glow on Hover */
        .nav-link:hover {
            color: #fff !important;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        }

        /* Custom Button Sign In */
        .btn-glow {
            border: 2px solid #fff;
            color: #fff;
            font-weight: 700;
            border-radius: 50px;
            padding: 8px 25px;
            transition: all 0.3s ease;
        }
        .btn-glow:hover {
            background-color: #fff;
            color: #0d0d0d;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.6);
        }
    </style>
</head>
<body>

    <!-- Sticky Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="text-danger">]</span> SEPUH
            </a>
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">HALL OF FAME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">FEED</a></li>
                </ul>
            </div>
            <div class="d-none d-lg-block">
                @guest
                    <!-- Jika belum login -->
                    <a href="{{ url('/login') }}" class="btn btn-glow">SIGN IN</a>
                @else
                    <!-- Jika sudah login -->
                    <div class="dropdown">
                        <a href="#" class="btn btn-glow dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" style="background-color: #1a1a1a;">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            @if(Auth::user()->role === 'admin')
                                <li><a class="dropdown-item text-warning" href="#">Dashboard Admin</a></li>
                            @endif
                            <li><hr class="dropdown-divider border-secondary"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main style="margin-top: 100px; min-height: 80vh;">
        @yield('content')
    </main>

    <!-- Simple Footer -->
    <footer class="text-center py-4 border-top" style="border-color: #333 !important;">
        <p class="mb-0 text-secondary small">&copy; 2026 Gabutnya Sepuh. All rights reserved.</p>
    </footer>

    <!-- Bootstrap 5 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>