@extends('layouts.app')

@section('title', 'Tambah Jadwal')
@section('header-title', 'Tambah Jadwal Piket')

@section('content')
<form action="{{ route('admin.jadwal.store') }}" method="POST">
    @csrf

    <x-form.input name="hari" label="Hari" type="date" />

    <div>
        <label for="siswa_id" class="block font-medium mb-1">Pilih Siswa</label>
        <select name="siswa_id" id="siswa_id" required class="w-full border-gray-300 rounded p-2">
            @foreach($siswa as $s)
                <option value="{{ $s->id }}">{{ $s->nama_siswa }}</option>
            @endforeach
        </select>
    </div>

    <x-form.submit label="Simpan Jadwal" />
</form>

@endsection
