<?php

namespace App\Http\Controllers;

use App\Models\DirPB;
use Illuminate\Http\Request;

class DirPBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = DirPB::all();
        return view('direksi.akses.apb1', compact('pengguna'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $pengguna = DirPB::all();
        return view('direksi.akses.ap1', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DirPB  $dirPB
     * @return \Illuminate\Http\Response
     */
    public function update(DirPB $dirPB)
    {
        DirPB::where('id', $dirPB->id)
            ->update([
                'validasi' => 'VALID',
            ]);
        return redirect('/direksi/akses/penggunabaru')->with('status', 'Pengguna Divalidasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DirPB  $dirPB
     * @return \Illuminate\Http\Response
     */
    public function destroy(DirPB $dirPB)
    {
        DirPB::destroy($dirPB->id);
        return redirect('/direksi/akses/penggunabaru')->with('status', 'Pengguna Berhasil Dihapus!');
    }

    public function TERIMA(DirPB $dirPB)
    {
        DirPB::where('id', $dirPB->id)
            ->update([
                'akses' => 'SETUJU',
            ]);
        return redirect('/direksi/akses/pengguna')->with('status', 'Akses Diberikan!');
        
    }

    public function TOLAK(DirPB $dirPB)
    {
        DirPB::where('id', $dirPB->id)
            ->update([
                'req_akses' => 'NORMAL',
                'akses' => 'BELUM',
            ]);
        return redirect('/direksi/akses/pengguna')->with('status', 'Permintaan Akses Ditolak!');
        
    }
    
}
