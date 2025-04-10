<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{env('APP_URL')}}build/assets/app-iU1YRGnh.css">
            <script src="{{env('APP_URL')}}build/assets/app-Cl5RxutH.js"></script>
            <div class="d-flex" id="wrapper">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
             <!-- Sidebar -->
        <div class="bg-dark text-black p-3 vh-100" style="width: 250px;">
            <h4>MyApp</h4>
            <ul class="nav flex-column mt-4">
                <li class="nav-item"><a href="/dashboard" class="nav-link text-black">Dashboard</a></li>
                <li class="nav-item"><a href="/profile" class="nav-link text-black">Profile</a></li>
                <li class="nav-item"><a href="/settings" class="nav-link text-black">Settings</a></li>
            </ul>
        </div>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
