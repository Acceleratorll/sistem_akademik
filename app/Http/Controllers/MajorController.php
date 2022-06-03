<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MajorController extends Controller
{
    public function index(){
        return view('page.major.index');
    }

    public function show($id)
    {
        try {
            $data = Major::find($id);
            return response()->json(['error' => false, 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            Major::create([
                'name' => $request->name,
                'desc'
            ]);
            return response()->json(['error' => false, 'message' => 'Berhasil Insert Data'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Major::find($request->id);
            $data->update([
                'name' => $request->name,
                'description'=>$request->description
            ]);
            return response()->json(['error' => false, 'message' => 'Berhasil Update Data'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $data = Major::find($id);
            $data->delete();
            return response()->json(['error' => false, 'message' => 'Berhasil Hapus Data'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function datatable()
    {
        $data = Major::where('deleted_at', null)
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
