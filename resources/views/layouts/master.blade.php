<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column h-100">
    <header class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info w-100">
            <a class="navbar-brand px-3" href="{{ route('products') }}" style="font-weight: 500">Amandemy Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto px-3">
                    @auth
                        @if (Auth::user()->role === 'superadmin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}" style="font-weight: 500">Manage
                                    Users</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.list') }}" style="font-weight: 500">Manage
                                Product</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link"
                                    style="text-decoration: none; font-weight: 500;">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" style="font-weight: 500">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" style="font-weight: 500">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <main class="flex-shrink-0">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
