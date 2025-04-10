<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Register Siswa</title>
</head>

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
    <form method="POST" action="{{ route('register.siswa') }}"
        class="bg-white rounded-lg shadow-xl text-sm text-gray-500 border border-gray-200 p-8 py-10 w-80 sm:w-[352px]">
        @csrf

        <p class="text-2xl font-medium text-center mb-4 text-indigo-500">Register Siswa</p>

        {{-- Error global --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-2 rounded mb-3 text-xs">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Username --}}
        <div class="mt-2">
            <label class="block">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" required
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500">
            @error('username')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mt-4">
            <label class="block">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="email@domain.com" required
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500">
            @error('email')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mt-4">
            <label class="block">Password</label>
            <input type="password" name="password" placeholder="******" required
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500">
            @error('password')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div class="mt-4">
            <label class="block">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" placeholder="Ulangi password" required
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500">
        </div>

        <hr class="my-5">

        {{-- Nama Siswa --}}
        <div class="mt-2">
            <label class="block">Nama Siswa</label>
            <input type="text" name="nama" value="{{ old('nama_siswa') }}" placeholder="Nama lengkap" required
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500">
            @error('nama_siswa')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        {{-- Kelas --}}
        <div class="mt-4">
            <label class="block">Kelas</label>
            <input type="text" name="kelas" value="{{ old('kelas') }}" placeholder="Contoh: XI RPL 1" required
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500">
            @error('kelas')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        {{-- No Induk --}}
        <div class="mt-4">
            <label class="block">No Induk</label>
            <input type="number" name="no_induk" value="{{ old('no_induk') }}" placeholder="123456" required
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500">
            @error('no_induk')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        {{-- No HP --}}
        <div class="mt-4">
            <label class="block">No HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp') }}" placeholder="08xxxxxxxxxx" required
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500">
            @error('no_hp')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit"
            class="bg-indigo-500 hover:bg-indigo-600 text-white w-full py-2 rounded-md mt-6 transition-all">
            Daftar
        </button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-500">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-indigo-500">Login</a>
    </p>
</body>

</html>
