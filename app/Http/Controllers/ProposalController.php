<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;

class ProposalController extends Controller
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
        $pengajuan = DB::table('pengajuan')
                        ->join('users', 'users.id', '=', 'pengajuan.mahasiswa_id')
                        ->where('pengajuan.approval', '=','1')
                        ->get();
        return view('pages.proposal.home', [
            'pengajuan' => $pengajuan
        ]);
    }

    public function getDownload($id)
    {
        //PDF file is stored under project/public/download/info.pdf
        $pengajuan = DB::table('pengajuan')
                        ->join('users', 'users.id', '=', 'pengajuan.mahasiswa_id')
                        ->where('pengajuan.id_pengajuan', '=',$id)
                        ->get();
        $file= public_path('files').'/'. $pengajuan[0]->file;

        $headers = array(
                'Content-Type: application/pdf',
                );

        return Response()->download($file, $pengajuan[0]->file, $headers);
    }
}
