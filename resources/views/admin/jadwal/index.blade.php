@extends('layouts.app')

@section('title', 'Jadwal Piket')
@section('header-title', 'Kelola Jadwal Piket')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.jadwal.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all">Tambah Jadwal</a>
</div>
<div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">No</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Hari</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Siswa</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $index => $item)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-800">{{ $index + 1 }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $item->hari }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $item->siswa->nama_siswa ?? '-' }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">
                    <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                    <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST" class="inline-block">
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
