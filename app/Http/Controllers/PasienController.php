<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function index()
    {

        $data_pasien = DB::table('pasien')->get();

    	return view('/pasien/index',['data_pasien' => $data_pasien]);
    }

    public function create(Request $request)
    {
        DB::table('pasien')->insert([
            'id_pasien' => $request->id_pasien,
            'rm_pasien' => $request->rm_pasien,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,

        ]);
        
	    return redirect('/pasien')->with('sukses','Data Berhasil Ditambahkan');
    }

    public function edit($id_pasien)
    {
        $data_pasien = DB::table('pasien')->where('id_pasien',$id_pasien)->get();

	    return view('/pasien/edit',['data_pasien' => $data_pasien]);
    }

    public function update(Request $request)
    {
	    DB::table('pasien')->where('id_pasien',$request->id_pasien)->update([
            'rm_pasien' => $request->rm_pasien,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,

        ]);
	    
	    return redirect('/pasien')->with('sukses','Data Berhasil Diubah');
    }

    public function hapus($id_pasien)
    {
	
	    DB::table('pasien')->where('id_pasien',$id_pasien)->delete();

	
	    return redirect('/pasien')->with('sukses','Data Berhasil Dihapus');
    }
}
