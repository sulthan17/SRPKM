<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
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
        $informasi = DB::table('informasi')->get();

        return view('pages.informasi.home', [
        'informasi' => $informasi
        ]);
    }
}
