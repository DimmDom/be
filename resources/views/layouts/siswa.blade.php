<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title', 'Dashboard Siswa')</title>
   @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
   <div class="flex h-screen">
      <!-- Sidebar -->
      <x-sidebar-siswa :tugas="isset($tugasSidebar) ? $tugasSidebar : (isset($tugas) ? $tugas : collect([]))" />

      <!-- Main Area -->
      <div class="flex-1 flex flex-col">
         <!-- Header -->
         <header class="bg-green-600 text-white p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">@yield('header-title', 'Dashboard Siswa')</h1>
            <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button type="submit" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">
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
