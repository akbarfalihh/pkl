<?php

namespace App\Http\Controllers;

use App\Models\DirKtgr;
use Illuminate\Http\Request;

class DirKtgrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($request->has('cari')) {
            $kategori = DirKtgr::where('nama_ktgr', 'LIKE', '%'.$request->cari.'%')->get();
        }
        else {
            $kategori = DirKtgr::all();
        }

        return view('direksi.kategori.ktgr', compact('kategori'));
    }

    public function index2(Request $request)
    {
        $kategori = DirKtgr::all();
        return view('direksi.akses.ak1', compact('kategori'));
    }


    public function TERIMA(DirKtgr $dirKtgr)
    {
        DirKtgr::where('id', $dirKtgr->id)
            ->update([
                'akses' => 'SETUJU',
            ]);
        return redirect('/direksi/akses/kategori')->with('status', 'Akses Diberikan!');
        
    }

    public function TOLAK(DirKtgr $dirKtgr)
    {
        DirKtgr::where('id', $dirKtgr->id)
            ->update([
                'req_akses' => 'NORMAL',
                'akses' => 'BELUM',
            ]);
        return redirect('/direksi/akses/kategori')->with('status', 'Permintaan Akses Ditolak!');
        
    }
}
