@extends('layouts.app')

@section('title', 'Data Siswa')
@section('header-title', 'Kelola Data Siswa')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.siswa.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all">Tambah Siswa</a>
</div>
<div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">No</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Nama Siswa</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Kelas</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">No Induk</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">No HP</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $index => $data)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-800">{{ $index + 1 }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $data->nama_siswa }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $data->kelas }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $data->no_induk }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $data->no_hp }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">
                    <a href="{{ route('admin.siswa.edit', $data->id) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                    <form action="{{ route('admin.siswa.destroy', $data->id) }}" method="POST" class="inline-block">
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
