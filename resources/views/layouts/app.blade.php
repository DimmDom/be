<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title', 'Dashboard Admin')</title>
   @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
   <div class="flex h-screen">
      <!-- Sidebar Navigation -->
      <aside class="w-64 bg-blue-800 text-white p-4">
         <div class="mb-8">
            <h2 class="text-2xl font-bold">Admin Panel</h2>
         </div>
         <nav>
            <ul>
               <li class="mb-2">
                  <a href="{{ route('admin.siswa') }}" class="block px-4 py-2 rounded hover:bg-blue-700">Data Siswa</a>
               </li>
               <li class="mb-2">
                  <a href="{{ route('admin.jadwal') }}" class="block px-4 py-2 rounded hover:bg-blue-700">Jadwal Piket</a>
               </li>
               <li class="mb-2">
                  <a href="{{ route('admin.tugas') }}" class="block px-4 py-2 rounded hover:bg-blue-700">Master Tugas</a>
               </li>
               <li class="mb-2">
                  <a href="{{ route('admin.riwayat') }}" class="block px-4 py-2 rounded hover:bg-blue-700">Riwayat Piket</a>
               </li>
            </ul>
         </nav>
      </aside>
      <!-- Main content area -->
      <div class="flex-1 flex flex-col">
         <!-- Header -->
         <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">@yield('header-title', 'Admin Dashboard')</h1>
            <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                  Logout
               </button>
            </form>
         </header>
         <!-- Page Content -->
         <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
         </main>
      </div>
   </div>
</body>
</html>
