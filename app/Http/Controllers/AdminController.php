<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
      return view('root/admin.index', compact('data'));
    }

    public function create()
    {
      $prodi = DB::table('prodi')->get();
      return view('root/admin.create', compact('prodi'));
    }

    public function store(Request $request)
    {
      DB::table('users')->insert([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make(123456),
        'jenis_kelamin' => $request->jenis_kelamin,
        'notelp' => $request->notelp,
        'id_prodi' => $request->prodi,
        'id_level' => 2
      ]);
      return redirect()->route('admin')
        ->with('success','Admin berhasil ditambahkan.');
    }

    public function edit($id)
    {
      $admin = Admin::findorfail($id);
      return view('root/admin.edit', compact('admin'));
    }

    public function update(Request $request)
    {
      DB::table('admin')->where('id',$request->id)->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'jenis_kelamin' => $request->jenis_kelamin,
        'notelp' => $request->notelp,
        'id_prodi' => $request->prodi,
        'id_level' => 2
      ]);
      return redirect()->route('admin')
        ->with('success','Data admin berhasil diperbarui.');
    }

    public function destroy($id)
    {
      DB::table('pengalaman_kerja')->where('id',$id)->delete();
      return redirect()->route('pengalaman_kerja.index')
                      ->with('success','Data Pengalaman Kerja berhasil dihapus.');
    }
}
