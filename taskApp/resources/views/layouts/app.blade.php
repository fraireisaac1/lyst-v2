<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Task App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-blue-500">
    <nav class="bg-[#0055ff] shadow p-4 text-white">
        <!-- Navbar content -->
         <h1 class="text-xl font-bold">My Task App</h1>
    </nav>
    <main class="inset-100 bg-gradient-to-br from-white via transparent to-blue p-4">
        @yield('content')
    </main>
</body>
</html>