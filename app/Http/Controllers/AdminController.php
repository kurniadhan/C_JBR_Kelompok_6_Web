<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Prodi;
use App\Models\User;

class AdminController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth()->user()->id;
        $users = User::find($id);
        $no = 1;
        $data = DB::table('users')
                ->join('prodi', 'prodi.id', '=', 'users.id_prodi')
                ->join('jurusan', 'jurusan.id', '=', 'users.id_jurusan')
                ->select('users.*', 'prodi.prodi', 'jurusan.jurusan')
                ->where([
                    ['level', 'admin']
                ])
                ->get();
        return view('root/admin.index', compact('no', 'data'));
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
        return view('admin/profile', compact('users', 'jurusan'));
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
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Profile Berhasil Diupdate!');
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
        return view('admin/password', compact('users'));
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
            return redirect('/admin/edit_password/' . $id)->with('error', 'Password Lama Salah!');
        }
        
        DB::table('users')->where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Password Berhasil Diupdate!');
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
        $id_prodi = $request->prodi;
        $data = Prodi::find($id_prodi);

        DB::table('users')->insert([
          'nama' => $request->nama,
          'email' => $request->email,
          'password' => Hash::make(123456),
          'jenis_kelamin' => $request->jenis_kelamin,
          'notelp' => $request->notelp,
          'id_prodi' => $request->prodi,
          'id_jurusan' => $data->id_jurusan,
          'level' => 'admin',
        ]);

        return redirect()->route('root.admin')->with('success', 'Admin Berhasil Ditambahkan!');
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
        $id_prodi = $request->prodi;
        $data = Prodi::find($id_prodi);

        DB::table('users')->where('id',$request->id)->update([
          'nama' => $request->nama,
          'email' => $request->email,
          'notelp' => $request->notelp,
          'id_prodi' => $request->prodi,
          'id_jurusan' => $data->id_jurusan,
        ]);

        return redirect()->route('root.admin')->with('success', 'Admin Berhasil Diupdate!');
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
        return redirect()->route('root.admin')->with('error', 'Admin Berhasil Dihapus!'); 
    }
}
