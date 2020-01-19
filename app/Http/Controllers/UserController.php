<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
        $user = Auth::user();
        $pengajuanBaru = DB::table('pengajuan')
                ->where('pengajuan.approval','=', '')   
                ->count();

            $pengajuanDisetujui = DB::table('pengajuan')
                    ->where('pengajuan.approval','=', '1')   
                    ->count();

            $pengajuanDitolak = DB::table('pengajuan')
                    ->where('pengajuan.approval','=', '0')   
                    ->count();

            $pengajuan = DB::table('pengajuan')
                        ->join('users', 'users.id', '=', 'pengajuan.mahasiswa_id')
                        ->where('pengajuan.dosen_id','=', $user->id)
                        ->where('pengajuan.approval','=', '')
                        ->get();

        if ($user->isAdmin()) {
            return view('pages.admin.home',[
                'pengajuan_baru'=> $pengajuanBaru,
                'pengajuan_disetujui' => $pengajuanDisetujui,
                'pengajuan_ditolak' => $pengajuanDitolak
            ]);
        }

        if($user->isDosen() || $user->isMahasiswa()){
            return view('pages.user.home',[
                'pengajuan' => $pengajuan,
                'pengajuan_baru'=> $pengajuanBaru,
                'pengajuan_disetujui' => $pengajuanDisetujui,
                'pengajuan_ditolak' => $pengajuanDitolak
            ]);
        }
        // return redirect('/modulfix/reviewer');
    }
}
