@extends('layouts.siswa')

@section('content')
  <h2 class="text-xl font-semibold mb-2">{{ $tugas->nama_tugas }}</h2>

  <form action="{{ route('siswa.tugas.submit', $tugas->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <textarea name="keterangan" class="w-full border p-2" placeholder="Keterangan tugas..." required></textarea>
    <input type="file" name="photo" class="block" required>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Kirim</button>
  </form>
@endsection
