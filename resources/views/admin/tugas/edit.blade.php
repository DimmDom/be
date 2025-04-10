@extends('layouts.app')

@section('title', 'Edit Tugas')
@section('header-title', 'Form Edit Tugas Kebersihan')

@section('content')
<form action="{{ route('admin.tugas.update', $tugas->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold mb-1">Nama Tugas</label>
        <input type="text" name="nama_tugas" value="{{ $tugas->nama_tugas }}" required
            class="w-full border border-gray-300 rounded p-2 focus:outline-indigo-500">
    </div>

    <div>
        <label class="block font-semibold mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="4"
            class="w-full border border-gray-300 rounded p-2 focus:outline-indigo-500">{{ $tugas->deskripsi }}</textarea>
    </div>

    <button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
</form>
@endsection
