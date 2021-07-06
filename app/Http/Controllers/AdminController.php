<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use File;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
      $data = DB::table('users')->get();
      return view('admin/admin.index', compact('data'));
    }

    public function create()
    {
      $prodi = DB::table('prodi')->get();
      $jurusan = DB::table('jurusan')->get();
      return view('admin/admin.create', compact('prodi','jurusan'));
    }

    public function store(Request $request)
    {
      DB::table('pengalaman_kerja')->insert([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'tahun_masuk' => $request->tahun_masuk,
        'tahun_keluar' => $request->tahun_keluar
      ]);
      return redirect()->route('pengalaman_kerja.index')
                      ->with('success','Data Pengalaman Kerja berhasil ditambahkan.');
    }

    public function edit($id)
    {
      $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id',$id)->first();
      $admin_lecturer = "Mengubah";
      return view('admin/admin.create', compact('pengalaman_kerja','admin_lecturer'));
    }

    public function update(Request $request)
    {
      DB::table('pengalaman_kerja')->where('id',$request->id)->update([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'tahun_masuk' => $request->tahun_masuk,
        'tahun_keluar' => $request->tahun_keluar
      ]);
      return redirect()->route('pengalaman_kerja.index')
                      ->with('success','Data Pengalaman Kerja berhasil diperbarui.');
    }

    public function destroy($id)
    {
      DB::table('pengalaman_kerja')->where('id',$id)->delete();
      return redirect()->route('pengalaman_kerja.index')
                      ->with('success','Data Pengalaman Kerja berhasil dihapus.');
    }
}
