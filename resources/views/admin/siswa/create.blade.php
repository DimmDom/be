@extends('layouts.app')

@section('title', 'Tambah Siswa')
@section('header-title', 'Tambah Data Siswa')

@section('content')
<form action="{{ route('admin.siswa.store') }}" method="POST" class="space-y-4">
    @csrf

    <x-form.input name="nama_siswa" label="Nama Siswa" />
    <x-form.input name="kelas" label="Kelas" />
    <x-form.input name="no_induk" label="No Induk" type="number" />
    <x-form.input name="no_hp" label="No HP" />
    <x-form.input name="email" label="Email Akun Siswa" type="email" />

    <div class="text-sm text-gray-600 bg-blue-50 border-l-4 border-blue-300 p-3 rounded">
        Password default akan dibuat otomatis dari nama siswa + <code>123</code><br>
        Contoh: <code>andi123</code>
    </div>

    <x-form.submit label="Simpan" />
</form>
@endsection
