@extends('layout')
@section('content')
<form method="post" action="{{ route('mahasiswa.update', $Mahasiswa->nim) }}" id="myForm">
    @csrf
    @method('PUT')
    <label for="Nim">Nim</label> <br>
    <input type="number" name="Nim" class="form-control" id="Nim" value="{{ $Mahasiswa->nim }}" aria-describedby="Nim" > <br>
    <label for="Nama">Nama</label> <br>
    <input type="text" name="Nama" class="form-control" id="Nama" value="{{ $Mahasiswa->nama }}" aria-describedby="Nama" > <br>
    <label for="pelajaran">Pelajaran</label> <br>
    <input type="number" name="pelajaran" class="form-control" id="pelajaran" value="{{ $Mahasiswa->pelajaran }}" aria-describedby="pelajaran" > <br>
    <label for="Jurusan">Jurusan</label> <br>
    <input type="number" name="Jurusan" class="form-control" id="Jurusan" value="{{ $Mahasiswa->jurusan }}" aria-describedby="Jurusan" > <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection