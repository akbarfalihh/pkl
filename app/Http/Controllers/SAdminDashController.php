<?php

namespace App\Http\Controllers;

use App\Models\SAdminDash;
use Illuminate\Http\Request;

class SAdminDashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashboard = SAdminDash::all();
        return view('superadmin.dashboard', compact('dashboard'));
    }
}
