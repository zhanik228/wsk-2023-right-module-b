<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.css') }}">
</head>
<body>
<header class="shadow mb-4">
    <nav class="nav justify-content-center">
        <ul class="nav-menu d-flex align-items-end gap-5 list-unstyled">
            <li class="nav-menu__list">
                <a href="{{ route('workspace.edit') }}" class="text-decoration-none fs-4 fw-bold">
                    @yield('workspace-title')
                </a>
            </li>
            <li class="nav-menu__list">
                <a href="{{ route('token.index') }}" class="text-decoration-none text-black fs-5">
                    Tokens
                </a>
            </li>
            <li class="nav-menu__list">
                <a href="#" class="text-decoration-none text-black fs-5">
                    Quotas
                </a>
            </li>
            <li class="nav-menu__list">
                <a href="#" class="text-decoration-none text-black fs-5">
                    Bills
                </a>
            </li>
        </ul>
    </nav>
</header>
@yield('content')
</body>
</html>
