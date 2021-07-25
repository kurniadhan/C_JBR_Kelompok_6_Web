<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Kegiatan;

class UserController extends Controller
{
    public function index()
    {
      $data = DB::table('kegiatan')->get();
      return view('user/landing', compact('data'));
    }
    public function contact()
    {
      $data = DB::table('users')->get();
      return view('user/contact', compact('data'));
    }
    public function show($id)
    {
      $kegiatan = Kegiatan::find($id);
      return view('user/work-single', compact('kegiatan', 'id'));
    }

}