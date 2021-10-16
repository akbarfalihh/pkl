<?php

namespace App\Http\Controllers;

use App\Models\UserKtgr;
use Illuminate\Http\Request;

class UserKtgrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $kategori = UserKtgr::where('nama_ktgr', 'LIKE', '%'.$request->cari.'%')->get();
        }
        else {
            $kategori = UserKtgr::all();
        }

        return view('user.kategori.ktgr', compact('kategori'));
    }
}
