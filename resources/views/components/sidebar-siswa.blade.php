@props(['tugas'])

<div class="w-64 bg-blue-800 text-white p-4 space-y-4">
    <h2 class="text-2xl font-bold">Tugas Hari Ini</h2>

    @if ($tugas->isEmpty())
        <p class="text-sm text-green-200 mt-2">Anda sudah menyelesaikan semua tugas hari ini 🎉</p>
    @else
        <ul class="space-y-2">
        @foreach ($tugas as $tugasItem)
        <li class="bg-blue-700 rounded p-2">
            <p class="font-semibold">{{ $tugasItem->nama_tugas }}</p>
            <p class="text-xs text-blue-200">{{ $tugasItem->deskripsi }}</p>
        </li>
        @endforeach

        </ul>
    @endif
</div>
