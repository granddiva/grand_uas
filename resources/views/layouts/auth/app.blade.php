<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem Posyandu</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow-lg">

        <!-- Logo Posyandu -->
        <div class="flex flex-col items-center mb-4">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAY1BMVEUAAAD///8AAACfn5+Tk5P8/PyioqKmpqbh4eG2trbV1dXT09O7u7vw8PDa2trQ0NDf39/m5uavr6/j4+Pz8/Pb29vBwcG6urrOzs7Jycm8vLy0tLTCwsK9vb3R0dHc3NyoqKhtbW3GxsaVkdzNAAABJElEQVR4nO3cW3LCMBBAUaGIl9tj+P8/0WJKJZjg5eQof8RP4eE0zY4xXHzkwmo7AGgAAAAAAAAAAAAB8PzW0fvk/sdzCYwH14r2raXI5QunlslqY5T2r8j04YfJwRoTSesxNUFDXL9uBeb5GsyhQOdE31jj6nS8EOD4NpTi27C/7fyqCkCmZJLdnOjFkMrDXLI4sdAlnXrhIRbkIuWGHWxirMRqXcUKNvztNFVQVw1Gc7YCOjxIqFZ3VAbAVYSEuxsjjXNMTvEihQ/HUkNzxaz2YsmiFjCwXTlzAIXazhbugzuDUFcPRl1BDpRP70dNDO4xjoMnIKPQ4j/wcgUp3NEPoPFcAckU4iRciqXvYDn8ApX2HFOKRSbuuSSMzdg3NofM8JrIoVNewWWm6yOD87Qy4V/mQJu1WDVYj1WFdsnEwe5caX5/C/PObbIVdQAAAAAAAAAAAAAAAPgDf50DJBSSTFUAAAAASUVORK5CYII="
                 class="w-24 mb-1" alt="Logo Posyandu">
            <p class="text-gray-700 font-semibold">Posyandu</p>
        </div>

        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Login Sistem Posyandu</h1>

        @if ($errors->any())
            <div class="p-3 mb-4 text-sm text-red-700 bg-red-100 border border-red-200 rounded-lg">
                <strong>Gagal Login!</strong> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring focus:ring-pink-200"
                    placeholder="contoh@domain.com" required>
            </div>

            <div class="mt-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring focus:ring-pink-200"
                    placeholder="Masukkan password" required>
            </div>

            <button type="submit"
                class="w-full py-2 px-4 bg-pink-600 text-white rounded-md hover:bg-pink-700 transition mt-4">
                MASUK
            </button>
        </form>
    </div>

</body>

</html>
