@extends('layout')
@section('content')
<a href="{{ route('mahasiswa.create') }}">Input Data</a>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Pelajaran</th>
            <th>Jurusan</th>
            <th width="280px"></th>
        </tr>
        @foreach ($mahasiswa as $mhs)
        <tr>
            <td>{{ $mhs ->nim }}</td>
            <td>{{ $mhs ->nama }}</td>
            <td>{{ $mhs ->pelajaran }}</td>
            <td>{{ $mhs ->jurusan }}</td>
        </tr>
        @endforeach
    </table>
    @endsection