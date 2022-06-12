<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Yajra\DataTables\DataTables;

class MahasiswaController extends Controller
{
    
    public function index(){
        return view('page.mahasiswa.index');
    }

    public function show($id)
    {
        try {
            $data = Mahasiswa::find($id);
            return response()->json(['error' => false, 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'major_id' => 'required'
        ]);
        try {
            Mahasiswa::create([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'major_id' => $request->major_id
            ]);
            return response()->json(['error' => false, 'message' => 'Berhasil Insert Data'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Mahasiswa::find($request->id);
            $data->update([
                'nama'=>$request->nama,
                'nim'=>$request->nim,
                'major_id'=>$request->major_id
            ]);
            return response()->json(['error' => false, 'message' => 'Berhasil Update Data'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $data = Mahasiswa::find($id);
            $data->delete();
            return response()->json(['error' => false, 'message' => 'Berhasil Hapus Data'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function datatable()
    {
        $data = Mahasiswa::where('deleted_at', null)->with('major')
        ->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '
                <a href="javascript:void(0)" onclick="editData(\'' . $row->id . '\')" class="btn btn-secondary btn-sm">Edit</a>
                <a href="javascript:void(0)" onclick="deleteData(\'' . $row->id . '\')" class="btn btn-danger btn-sm">Delete</a>
                ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
    
    