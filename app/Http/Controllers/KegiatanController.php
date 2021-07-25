<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Kegiatan;
use App\Models\User;
use File;

class KegiatanController extends Controller
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
        $data = DB::table('kegiatan')
                ->join('jurusan', 'jurusan.id', '=', 'kegiatan.id_jurusan')
                ->select('kegiatan.*', 'jurusan.jurusan')
                ->where([
                    ['status', 1],
                    ['id_prodi', $users->id_prodi]
                ])
                ->orWhere([
                    ['status', 1],
                    ['id_prodi', 0],
                    ['id_jurusan', $users->id_jurusan]
                ])
                ->get();

        return view('admin/kegiatan.index', compact('no', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = DB::table('prodi')->get();
        $jurusan = DB::table('jurusan')->get();
        return view('admin/kegiatan.create', compact('prodi', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_user = Auth()->user()->id;
        $file = $request->file('img');
        if (empty($file)){
            return redirect()->route('kegiatan.create')->with('error', 'Foto Tidak Boleh Kosong!');
        }

        $jenis = $request->jenis;
        if ($jenis == 'Internal'){
            $id_prodi = Auth()->user()->id_prodi;
            $id_jurusan = Auth()->user()->id_jurusan;
        } elseif ($jenis == 'Eksternal') {
            $id_prodi = 0;
            $id_jurusan = Auth()->user()->id_jurusan;
        }
        
        $namaFoto = uniqid() . '_' . 'pamflet_kegiatan' . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('frontend/img'), $namaFoto);

        DB::table('kegiatan')->insert([
          'judul' => $request->judul,
          'nama_pemateri' => $request->nama_pemateri,
          'kategori' => $request->kategori,
          'jenis' => $request->jenis,
          'id_prodi' => $id_prodi,
          'id_jurusan' => $id_jurusan,
          'tgl_buka' => $request->tgl_buka,
          'tgl_tutup' => $request->tgl_tutup,
          'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
          'jam_mulai' => $request->jam_mulai,
          'jam_selesai' => $request->jam_selesai,
          'contact_person' => $request->contact_person,
          'nama_foto' => $namaFoto,
          'link_meet' => 'https://' . $request->link_meet,
          'deskripsi' => $request->deskripsi,
          'status' => 1,
          'id_user' => $id_user,
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
        $kegiatan = Kegiatan::find($id);
        $prodi = DB::table('prodi')->get();
        $jurusan = DB::table('jurusan')->get();
        return view('admin/kegiatan.edit', compact('kegiatan', 'prodi', 'jurusan'));
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
        $kegiatan = Kegiatan::find($id);
        $id_user = Auth()->user()->id;
        $oldImg = $request->oldImg;
        $file = $request->file('img');

        if (!empty($file)){
            $namaFoto = uniqid() . '_' . 'pamflet_kegiatan' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('frontend/img'), $namaFoto);
            unlink("frontend/img/" . $oldImg);
        } else {
            $namaFoto = $oldImg;
        }

        $jenis = $request->jenis;
        if ($jenis == 'Internal'){
            $id_prodi = Auth()->user()->id_prodi;
            $id_jurusan = Auth()->user()->id_jurusan;
        } elseif ($jenis == 'Eksternal') {
            $id_prodi = 0;
            $id_jurusan = Auth()->user()->id_jurusan;
        }

        DB::table('kegiatan')->where('id',$request->id)->update([
            'judul' => $request->judul,
            'nama_pemateri' => $request->nama_pemateri,
            'kategori' => $request->kategori,
            'jenis' => $request->jenis,
            'id_prodi' => $id_prodi,
            'id_jurusan' => $id_jurusan,
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
            'id_user' => $id_user,
        ]);

        return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan Berhasil di Update!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $kegiatan = Kegiatan::find($id);
        $status = $kegiatan->status == "1" ? "0" : "1";
        DB::table('kegiatan')->where('id', $id)->update([
            'status' => $status,
        ]);

        if ($status == "0"){
            return redirect()->route('admin.riwayat')->with('error', 'Status Kegiatan Berhasil di Nonaktifkan!');
        } else {
            return redirect()->route('admin.kegiatan')->with('success', 'Status Kegiatan Berhasil di Aktfikan!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        $image = $kegiatan->nama_foto;
        Kegiatan::where('id', $id)->delete();
        unlink("frontend/img/" . $image);
        return redirect()->route('admin.kegiatan')->with('error', 'Kegiatan Berhasil Dihapus!'); 
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function riwayat()
    {
        $id = Auth()->user()->id;
        $users = User::find($id);
        $no = 1;
        $data = DB::table('kegiatan')
                ->join('jurusan', 'jurusan.id', '=', 'kegiatan.id_jurusan')
                ->select('kegiatan.*', 'jurusan.jurusan')
                ->where([
                    ['status', 0],
                    ['id_prodi', $users->id_prodi]
                ])
                ->orWhere([
                    ['status', 0],
                    ['id_prodi', 0],
                    ['id_jurusan', $users->id_jurusan]
                ])
                ->get();
                
        return view('admin.riwayat', compact('no', 'data'));
    }
}
