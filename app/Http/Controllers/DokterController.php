<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    public function index()
    {

        
        $data_dokter = DB::table('dokter')->get();

    	
    	return view('/dokter/index',['data_dokter' => $data_dokter]);
    }

    public function create(Request $request)
    {
        
        DB::table('dokter')->insert([
            'id_dokter' => $request->id_dokter,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'kontak' => $request->kontak,
            'status' => $request->status,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,

        ]);
        
	    return redirect('/dokter')->with('sukses','Data Berhasil Ditambahkan');
    }

        
    public function edit($id_dokter)
    {
	    
        $data_dokter = DB::table('dokter')->where('id_dokter',$id_dokter)->get();

	    
	    return view('/dokter/edit',['data_dokter' => $data_dokter]);
    }

        
    public function update(Request $request)
    {
	    
	    DB::table('dokter')->where('id_dokter',$request->id_dokter)->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'kontak' => $request->kontak,
            'status' => $request->status,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,

        ]);
	   
	    return redirect('/dokter')->with('sukses','Data Berhasil Diubah');
    }

        
    public function hapus($id_dokter)
    {
	    
	    DB::table('dokter')->where('id_dokter',$id_dokter)->delete();

	    
	    return redirect('/dokter')->with('sukses','Data Berhasil Dihapus');
    }
}
