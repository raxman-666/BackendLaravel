<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Buku;
use Error;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Buku::all();
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'jenis_buku' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson());
        }
        $create = Buku::create([
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'jenis_buku' => $request->jenis_buku,
        ]);
        if ($create) {
            return response()->json(['status' => true, 'message' => 'Sukses menambah data buku.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menambah data buku.']);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'judul_buku' => 'required',
            'jenis_buku' => 'required',
            'pengarang' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson());
        }
        $update = Buku::where('id_buku', $id)->update([
            'judul_buku' => $request->get('judul_buku'),
            'jenis_buku' => $request->get('jenis_buku'),
            'pengarang' => $request->get('pengarang')
        ]);
        if ($update) {
            return response()->json(['status' => true, 'message' => 'Sukses mengubah data buku.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal mengubah data buku.']);
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
        $delete = Buku::where('id_buku', $id)->delete();
        if ($delete) {
            return response()->json(['status' => true, 'message' => 'Sukses menghapus data buku.']);
        }
        return response()->json(['status' => true, 'message' => 'Gagal menghapus data buku.']);
    }

    public function search($id)
    {
        $result = Buku::where('id_buku', '=', $id)->get();
        return response()->json($result);
    }
}
