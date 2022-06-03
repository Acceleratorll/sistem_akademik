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
            <td>
                <form action="{{ route('mahasiswa.destroy',['mahasiswa'=>$mhs->nim]) }}" method="POST">
                <a class="button" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>      
        </tr>
        @endforeach
    </table>
    @endsection