<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = DB::table('mahasiswa')->get();
        $post =  Mahasiswa::all();
        return view('index', compact('mahasiswa'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index');
    }
    
    public function edit($Nim)
    {
        $Mahasiswa = DB::table('mahasiswa')->where('nim', $Nim)->first();
        return view('edit', compact('Mahasiswa'));
        
    }
    public function update(Request $request, $Nim)
    {    
        Mahasiswa::where('nim', $Nim)->first()->update($request->all());
        return redirect()->route('mahasiswa.index');
    }
    public function destroy($Nim)
    {
        Mahasiswa::where('nim', $Nim)->first()->delete();
        return redirect()->route('mahasiswa.index');
    }
}
    
    