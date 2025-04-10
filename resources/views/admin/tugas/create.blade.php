@extends('layouts.app')

@section('title', 'Tambah Tugas')
@section('header-title', 'Form Tambah Tugas Kebersihan')

@section('content')
<form action="{{ route('admin.tugas.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block font-semibold mb-1">Nama Tugas</label>
        <input type="text" name="nama_tugas" required
            class="w-full border border-gray-300 rounded p-2 focus:outline-indigo-500" placeholder="Contoh: Menyapu lantai">
    </div>

    <div>
        <label class="block font-semibold mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="4"
            class="w-full border border-gray-300 rounded p-2 focus:outline-indigo-500"
            placeholder="Deskripsikan tugas secara detail..."></textarea>
    </div>

    <button type="submit"
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
</form>
@endsection
