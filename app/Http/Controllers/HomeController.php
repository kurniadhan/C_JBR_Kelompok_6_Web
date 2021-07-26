<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin = DB::table('users')
                ->where('level', "Admin")
                ->count();
        $kegiatan = DB::table('kegiatan')
                ->where('status', 1)
                ->count();
        $riwayat = DB::table('kegiatan')
                ->where('status', 0)
                ->count();
        return view ('root.dashboard', compact('admin', 'kegiatan', 'riwayat'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        $id = Auth()->user()->id;
        $users = User::find($id);
        $prodi = DB::table('users')
                ->join('prodi', 'prodi.id', '=', 'users.id_prodi')
                ->select('prodi.prodi')
                ->where([
                    ['id_prodi', $users->id_prodi],
                    ['users.id', $users->id]  
                ])
                ->get();
        $kegiatan = DB::table('kegiatan')
                ->where([
                    ['status', 1],
                    ['id_prodi', $users->id_prodi]
                ])
                ->orWhere([
                    ['status', 1],
                    ['id_prodi', 0],
                    ['id_jurusan', $users->id_jurusan]
                ])
                ->count();
        $riwayat = DB::table('kegiatan')
                ->where([
                    ['status', 0],
                    ['id_prodi', $users->id_prodi]
                ])
                ->orWhere([
                    ['status', 0],
                    ['id_prodi', 0],
                    ['id_jurusan', $users->id_jurusan]
                ])
                ->count();
        return view ('admin.dashboard', compact('prodi', 'kegiatan', 'riwayat'));
    }
}
