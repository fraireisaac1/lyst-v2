<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Task App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-200 p-1 m-2 grid place-content-center">
    <nav class="min-w-sm max-w-5xl bg-gradient-to-br from-green-400 via transparent to-green-700 border-4 border-teal-600 p-4 text-white rounded-md">
        <!-- Navbar content -->
         <h1 class="text-3xl font-bold font-serif p-2 text-center tracking-widest">['L', 'y', 's', 't']</h1>
    </nav>
    <main class="min-w-sm max-w-5xl bg-gradient-to-br from-gray-50 via transparent to-gray-100 inset-100 rounded-md shadow-white border-2 border-teal-600 p-4 m-2">
        @yield('content')
    </main>
</body>
</html>