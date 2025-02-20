<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Task App</title>
    @vite(['resources/css/app.css', 'resourses/js/app.js'])

</head>
<body class="bg-black p-1">
    <nav class="bg-[#808080] p-4 text-white rounded-md">
        <!-- Navbar content -->
         <h1 class="text-xl font-bold p-2 ">My Task App</h1>
    </nav>
    <main class="inset-100 rounded-md shadow-white bg-gradient-to-br from-white via transparent to-blue p-4">
        @yield('content')
    </main>
</body>
</html>