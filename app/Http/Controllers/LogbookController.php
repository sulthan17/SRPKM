<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;

class LogbookController extends Controller
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
        $current_user = Auth::user();
        $log_book = DB::table('log_book')
                    ->join('users', 'users.id', '=', 'log_book.dosen_id')
                    ->join('pengajuan', 'pengajuan.id_pengajuan', '=', 'log_book.id_pengajuan')
                    ->where('pengajuan.mahasiswa_id', '=', $current_user->id)
                    ->get();
        
        return view('pages.logbook.home', [
            'log_book' => $log_book
        ]);
    }
}
