@extends('layouts.app')

@section('title', 'Riwayat Piket')
@section('header-title', 'Riwayat Piket')

@section('content')

<div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Siswa</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Tugas</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Status</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Keterangan</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b">Bukti Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $r)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-800">{{ $r->siswa->nama_siswa ?? '-' }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $r->tugas->nama_tugas ?? '-' }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">
                    <span class="inline-block px-2 py-1 rounded-full 
                        @if($r->status == 'Selesai') bg-green-200 text-green-800 @elseif($r->status == 'Belum Selesai') bg-yellow-200 text-yellow-800 @else bg-red-200 text-red-800 @endif">
                        {{ $r->status }}
                    </span>
                </td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $r->keterangan }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">
                    @if ($r->photo)
                        <a href="{{ asset('storage/' . $r->photo) }}" target="_blank" class="text-indigo-600 hover:underline">Lihat</a>
                    @else
                        <span class="text-gray-400">Tidak ada</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
