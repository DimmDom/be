@extends('layouts.app')

@section('title', 'Edit Jadwal')
@section('header-title', 'Edit Jadwal Piket')

@section('content')
<form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <x-form.input name="hari" label="Hari Tanggal" type="date" :value="$jadwal->hari" />

    <div>
        <label for="siswa_id" class="block font-medium mb-1">Pilih Siswa</label>
        <select name="siswa_id" id="siswa_id" required class="w-full border-gray-300 rounded p-2">
            @foreach($siswa as $s)
                <option value="{{ $s->id }}" {{ $jadwal->siswa_id == $s->id ? 'selected' : '' }}>
                    {{ $s->nama_siswa }} - {{ $s->kelas }}
                </option>
            @endforeach
        </select>
    </div>

    <x-form.submit label="Update Jadwal" />
</form>
@endsection
