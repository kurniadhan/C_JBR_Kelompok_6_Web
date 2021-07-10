<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use File;

class UserController extends Controller
{
    public function index()
    {
      $data = DB::table('kegiatan')->get();
      return view('user/landing', compact('data'));
    }
    public function contact()
    {
      $data = DB::table('admin')->get();
      return view('user/contact', compact('data'));
    }
    public function show()
    {
      $data = DB::table('kegiatan')->get();
      return view('user/work-single', compact('data'));
    }

}