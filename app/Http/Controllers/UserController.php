<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;

class UserController extends Controller
{
    public function index()
    {
      $data = DB::table('kegiatan')
              ->orderBy('tgl_pelaksanaan', 'desc')
              ->where('status', 1)
              ->paginate(9);
      return view('user.dashboard', compact('data'));
    }

    public function about()
    {
      $data = DB::table('kegiatan')->get();
      return view('user.about', compact('data'));
    }

    public function contact()
    {
      $data = DB::table('users')->get();
      return view('user.contact', compact('data'));
    }

    public function detail_kegiatan($id)
    {
      $kegiatan = Kegiatan::find($id);
      return view('user.detail_kegiatan', compact('kegiatan', 'id'));
    }

}