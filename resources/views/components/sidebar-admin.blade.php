@props(['active'])

<div class="w-64 bg-blue-900 text-white p-6 space-y-6">
  <h1 class="text-2xl font-bold">Admin Panel</h1>
  <nav class="space-y-4">
    <a href="{{ route('admin.siswa') }}" class="block px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-blue-800 {{ $active === 'siswa' ? 'text-blue-300 bg-blue-700' : 'text-white' }}">
      Master Siswa
    </a>
    <a href="{{ route('admin.jadwal') }}" class="block px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-blue-800 {{ $active === 'jadwal' ? 'text-blue-300 bg-blue-700' : 'text-white' }}">
      Jadwal Piket
    </a>
    <a href="{{ route('admin.tugas') }}" class="block px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-blue-800 {{ $active === 'tugas' ? 'text-blue-300 bg-blue-700' : 'text-white' }}">
      Master Tugas
    </a>
    <a href="{{ route('admin.riwayat') }}" class="block px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-blue-800 {{ $active === 'riwayat' ? 'text-blue-300 bg-blue-700' : 'text-white' }}">
      Riwayat
    </a>
  </nav>
</div>
