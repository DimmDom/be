@extends('layouts.app')

@section('title', 'Master Tugas')
@section('header-title', 'Kelola Tugas Kebersihan')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.tugas.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all">Tambah Tugas</a>
</div>
<div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">No</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Nama Tugas</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Deskripsi</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tugas as $index => $item)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-800">{{ $index + 1 }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $item->nama_tugas }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ \Illuminate\Support\Str::limit($item->deskripsi, 50) }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">
                    <a href="{{ route('admin.tugas.edit', $item->id) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                    <form action="{{ route('admin.tugas.destroy', $item->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-600 ml-4" onclick="return confirm('Yakin akan dihapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
