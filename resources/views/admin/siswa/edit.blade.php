@extends('layouts.app')

@section('title', 'Edit Siswa')
@section('header-title', 'Edit Data Siswa')

@section('content')
<form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    {{-- Username login siswa --}}
    <x-form.input name="username" label="Username Akun" :value="$siswa->user->username ?? ''" />

    {{-- Email login siswa --}}
    <x-form.input name="email" label="Email Akun" type="email" :value="$siswa->user->email ?? ''" />

    {{-- Nama Lengkap --}}
    <x-form.input name="nama_siswa" label="Nama Siswa" :value="$siswa->nama_siswa" />

    {{-- Kelas --}}
    <x-form.input name="kelas" label="Kelas" :value="$siswa->kelas" />

    {{-- No Induk --}}
    <x-form.input name="no_induk" label="No Induk" type="number" :value="$siswa->no_induk" />

    {{-- No HP --}}
    <x-form.input name="no_hp" label="No HP" :value="$siswa->no_hp" />

    <x-form.submit label="Update" />
</form>
@endsection
