<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $data = DB::table('users')->get();
        return view('root/admin.index', compact('no', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = DB::table('prodi')->get();
        return view('root/admin.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('users')->insert([
          'nama' => $request->nama,
          'email' => $request->email,
          'password' => Hash::make(123456),
          'jenis_kelamin' => $request->jenis_kelamin,
          'notelp' => $request->notelp,
          'id_prodi' => $request->prodi,
          'level' => 'admin',
        ]);

        return redirect()->route('admin')->with('success', 'Admin Berhasil Ditambahkan!');
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
        $admin = Admin::find($id);
        $prodi = DB::table('prodi')->get();
        return view('root/admin.edit', compact('admin', 'prodi'));
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
        //dd($request);
        DB::table('users')->where('id',$request->id)->update([
          'nama' => $request->nama,
          'email' => $request->email,
          'notelp' => $request->notelp,
          'id_prodi' => $request->prodi,
        ]);

        return redirect()->route('admin')->with('success', 'Admin Berhasil Ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        Admin::where('id', $id)->delete();
        return redirect()->route('admin')->with('error', 'Admin Berhasil Dihapus!'); 
    }
}
