<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Kegiatan;
use File;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $data = DB::table('kegiatan')->get();
        return view('admin/kegiatan.index', compact('no', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kegiatan = DB::table('kegiatan')->get();
        $prodi = DB::table('prodi')->get();
        $jurusan = DB::table('jurusan')->get();
        return view('admin/kegiatan.create', compact('kegiatan', 'prodi', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('img');
        $namaFoto = uniqid() . '_' . 'pamflet_kegiatan' . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img'), $namaFoto);

        DB::table('kegiatan')->insert([
          'judul' => $request->judul,
          'nama_pemateri' => $request->nama_pemateri,
          'kategori' => $request->kategori,
          'jenis' => $request->jenis,
          'id_prodi' => $request->prodi,
          'id_jurusan' => $request->jurusan,
          'tgl_buka' => $request->tgl_buka,
          'tgl_tutup' => $request->tgl_tutup,
          'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
          'jam_mulai' => $request->jam_mulai,
          'jam_selesai' => $request->jam_selesai,
          'contact_person' => $request->contact_person,
          'nama_foto' => $namaFoto,
          'link_meet' => $request->link_meet,
          'deskripsi' => $request->deskripsi,
          'status' => 1,
        ]);

        return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan Berhasil Ditambahkan!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
