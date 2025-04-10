@extends('layouts.siswa')

@section('content')
  <h2 class="text-xl font-bold mb-4">Tugas Hari Ini</h2>
  @if ($tugas->isEmpty())
    <p class="text-gray-500">Tidak ada tugas hari ini.</p>
  @else
    <ul class="space-y-2">
      @foreach ($tugas as $item)
        <li class="bg-white shadow p-4 rounded">
          <div class="flex justify-between items-center">
            <div>{{ $item->nama_tugas }}</div>
            <a href="{{ route('siswa.tugas.detail', $item->id) }}"
               class="text-blue-600 hover:underline">Lihat Detail</a>
          </div>
        </li>
      @endforeach
    </ul>
  @endif
@endsection
