@extends('layout')
@section('content')
<form action="{{ route('mahasiswa.store') }}" method="post">
    @csrf
    <label for="nim">NIM</label><br>
    <input type="number" name="nim" aria-describedby="nim"><br>
    <label for="nama" >Nama</label><br>
    <input type="text" name="nama" aria-describedby="nama"><br>
    <label for="pelajaran">Pelajaran</label><br>
    <input type="number" name="pelajaran" aria-describedby="pelajaran"><br>
    <label for="jurusan">Jurusan</label><br>
    <input type="number" name="jurusan" aria-describedby="jurusan"><br>
    <button type="submit">Submit</button>
</form>
@endsection