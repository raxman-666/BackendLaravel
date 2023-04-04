<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use Error;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Mahasiswa::get();

        $data =  DB::table('mahasiswa')
            ->join('jurusan', 'mahasiswa.id_jurusan', '=', 'jurusan.id')
            ->select('mahasiswa.id', 'mahasiswa.nama', 'mahasiswa.jenisKelamin', 'mahasiswa.alamat', 'jurusan.nama_jurusan')
            ->get();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'jenisKelamin' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson());
        }
        $create = Mahasiswa::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenisKelamin' => $request->jenisKelamin,
        ]);
        if ($create) {
            return response()->json(['status' => true, 'message' => 'Sukses menambah data mahasiswa.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menambah data mahasiswa.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'alamat' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson());
        }
        $update = Mahasiswa::where('id', $id)->update([
            'nama' => $request->get('nama'),
            'jenisKelamin' => $request->get('jenisKelamin'),
            'alamat' => $request->get('alamat')
        ]);
        if ($update) {
            return response()->json(['status' => true, 'message' => 'Sukses mengubah data mahasiswa.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal mengubah data mahasiswa.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Mahasiswa::where('id', $id)->delete();
        if ($delete) {
            return response()->json(['status' => true, 'message' => 'Sukses menghapus data mahasiswa.']);
        }
        return response()->json(['status' => true, 'message' => 'Gagal menghapus data mahasiswa.']);
    }

    public function search($id)
    {
        // $result = Mahasiswa::where('id', '=', $id)->get();
        $result =  DB::table('mahasiswa')
            ->join('jurusan', 'mahasiswa.id_jurusan', '=', 'jurusan.id')
            ->select('mahasiswa.id', 'mahasiswa.nama', 'mahasiswa.jenisKelamin', 'mahasiswa.alamat', 'jurusan.nama_jurusan')
            ->where('mahasiswa.id', $id)
            ->get();

        return response()->json($result);
    }
}
