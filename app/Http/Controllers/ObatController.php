<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    public function index()
    {

        
        $data_obat = DB::table('obat')->get();

    	
    	return view('/obat/index',['data_obat' => $data_obat]);
    }

    public function create(Request $request)
    {
        
        DB::table('obat')->insert([
            'id_obat' => $request->id_obat,
            'nama_obat' => $request->nama_obat,
            'stok' => $request->stok,
            'kadarluarsa' => $request->kadarluarsa,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,

        ]);
        
	    return redirect('/obat')->with('sukses','Data Berhasil Ditambahkan');
    }

        
    public function edit($id_obat)
    {
	   
        $data_obat = DB::table('obat')->where('id_obat',$id_obat)->get();

	    
	    return view('/obat/edit',['data_obat' => $data_obat]);
    }

        
    public function update(Request $request)
    {
	    DB::table('obat')->where('id_obat',$request->id_obat)->update([
            'nama_obat' => $request->nama_obat,
            'stok' => $request->stok,
            'kadarluarsa' => $request->kadarluarsa,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,

        ]);
	    
	    return redirect('/obat')->with('sukses','Data Berhasil Diubah');
    }

        
    public function hapus($id_obat)
    {
	    
	    DB::table('obat')->where('id_obat',$id_obat)->delete();

	    
	    return redirect('/obat')->with('sukses','Data Berhasil Dihapus');
    }
}
