<?php

namespace App\Http\Controllers;

use Auth;

class PengajuanDosenController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pengajuan_dosen_pembimbing.home');
    }
}
