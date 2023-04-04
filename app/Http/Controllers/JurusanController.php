<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use PHPUnit\TextUI\XmlConfiguration\Logging\Junit;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jurusan::get();
        return response()->json($data);
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
            'nama_jurusan' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson());
        }
        $create = Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
        ]);
        if ($create) {
            return response()->json(['status' => true, 'message' => 'Sukses menambah data jurusan.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menambah data jurusan.']);
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
            'nama_jurusan' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson());
        }
        $update = Jurusan::where('id', $id)->update([
            'nama_jurusan' => $request->get('nama_jurusan')
        ]);
        if ($update) {
            return response()->json(['status' => true, 'message' => 'Sukses mengubah data jurusan.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal mengubah data jurusan.']);
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
        $delete = Jurusan::where('id', $id)->delete();
        if ($delete) {
            return response()->json(['status' => true, 'message' => 'Sukses menghapus data jurusan.']);
        }
        return response()->json(['status' => true, 'message' => 'Gagal menghapus data jurusan.']);
    }

    public function search($id)
    {
        $result = Jurusan::where('id', '=', $id)->get();
        return response()->json($result);
    }
}
