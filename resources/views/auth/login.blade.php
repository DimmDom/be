<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<!-- Center layout -->
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        background-color: #f9fafb;
    }
</style>

<body>
    <form method="POST" action="{{ route('login') }}"
        class="bg-white rounded-lg shadow-xl text-sm text-gray-500 border border-gray-200 p-8 py-12 w-80 sm:w-[352px]">
        @csrf

        <p class="text-2xl font-medium text-center mb-4">
            <span class="text-indigo-500">Login</span>
        </p>

        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-2 rounded mb-2 text-xs">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="mt-2">
            <label class="block">Email</label>
            <input type="email" name="email" placeholder="email@domain.com" required
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500">
        </div>

        <div class="mt-4">
            <label class="block">Password</label>
            <input type="password" name="password" placeholder="******" required
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500">
        </div>

        <p class="mt-4">
            Belum punya akun?
            <a href="/register" class="text-indigo-500">Register</a>
        </p>

        <button type="submit"
            class="bg-indigo-500 hover:bg-indigo-600 transition-all text-white w-full py-2 rounded-md mt-4">
            Login
        </button>
    </form>
</body>

</html>
