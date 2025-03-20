<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="p-4 bg-blue-500 text-white flex justify-between">
        <a href="{{ route('posts.index') }}" class="font-bold">Home</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="ml-4">Logout</button>
        </form>
    </nav>
    <div class="container mx-auto p-6">
        @yield('content')
    </div>
</body>
</html>
