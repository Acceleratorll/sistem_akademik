@extends('layout')
@section('content')
<form action="{{ route('mahasiswa.insert') }}" method="post">
    <label for="nim">NIM</label>
    <input type="number" name="nim">
    <label for="nim">Nama</label>
    <input type="text" name="nama">
    <label for="nim">pelajaran</label>
    <input type="number" name="pelajaran">
    <label for="nim">jurusan</label>
    <input type="number" name="jurusan">
</form>
@endsection