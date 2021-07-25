<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RootController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $users = User::find($id);
        $jurusan = DB::table('jurusan')->get();
        return view('root/profile', compact('users', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update([
          'nama' => $request->nama,
          'email' => $request->email,
          'notelp' => $request->notelp,
          'id_jurusan' => $request->jurusan,
        ]);

        return redirect()->route('root.dashboard')->with('success', 'Profile Berhasil Diupdate!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password($id)
    {
        $users = User::find($id);
        return view('root/password', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, $id)
    {
        $users = User::find($id);
        $hashedPassword = $users->password;
        if (!Hash::check($request->oldPass, $hashedPassword)){ 
            return redirect('root/edit_password/' . $id)->with('error', 'Password Lama Salah!');
        }
        
        DB::table('users')->where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('root.dashboard')->with('success', 'Password Berhasil Diupdate!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kegiatan()
    {
        $no = 1;
        $data = DB::table('kegiatan')
                ->join('prodi', 'prodi.id', '=', 'kegiatan.id_prodi')
                ->join('jurusan', 'jurusan.id', '=', 'kegiatan.id_jurusan')
                ->select('kegiatan.*', 'prodi.prodi', 'jurusan.jurusan')
                ->where('status', 1)
                ->get();

        return view('root/kegiatan.index', compact('data', 'no'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function riwayat()
    {
        $no = 1;
        $data = DB::table('kegiatan')
                ->join('prodi', 'prodi.id', '=', 'kegiatan.id_prodi')
                ->join('jurusan', 'jurusan.id', '=', 'kegiatan.id_jurusan')
                ->select('kegiatan.*', 'prodi.prodi', 'jurusan.jurusan')
                ->where('status', 0)
                ->get();

        return view('root/kegiatan.riwayat', compact('data', 'no'));
    }
}
