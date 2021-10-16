<?php

namespace App\Http\Controllers;

use App\Models\DirFS1;
use App\Models\DirSM1;
use App\Models\DirKtgr;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DirFS1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $format_surat = DirFS1::all();
        return view('direksi.formatsurat1.fs1', compact('format_surat'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DirFS1  $dirFS1
     * @return \Illuminate\Http\Response
     */
    public function show(DirFS1 $dirFS1)
    {
        return view('direksi.formatsurat1.sf1', compact('dirFS1'));
    }

    public function show2($file)
    {
        return response()->file('UploadFileFS1/'.$file);
    }
}
