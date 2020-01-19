<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $current_user = Auth::user();

        $pengajuan = DB::table('pengajuan')
                    ->join('users', 'users.id', '=', 'pengajuan.dosen_id')
                    ->where('pengajuan.mahasiswa_id','=', $current_user->id)
                    ->get();
        return view('pages.pengajuan_dosen_pembimbing.home', [
            'pengajuan' => $pengajuan
        ]);
    }

    public function tambah(Request $request){
        if(empty($_POST)){
            $dosen_list = DB::table('role_user')
                    ->join('users', 'users.id', '=', 'role_user.user_id')
                    ->where('role_user.role_id', '=', 6)
                    ->get();
            return view('pages.pengajuan_dosen_pembimbing.tambah',[
                'dosen_list' => $dosen_list
            ]);
        }else{
            $originalName = $request->file('file')->getClientOriginalName();
            $originalExtension = $request->file('file')->getClientOriginalExtension();
            if ($request->file('file')->isValid() && $originalExtension == 'pdf') {
                $uniqueFileName = uniqid() . $originalName;
                $request->file('file')->move(public_path('files'),$uniqueFileName);
                $user = Auth::user();
                $insert = DB::table('pengajuan')->insert(
                    [
                        'nama_proposal' => $_POST['nama_proposal'], 
                        'dosen_id' =>  $_POST['dosen_id'],
                        'file' =>$uniqueFileName,
                        'mahasiswa_id'=> $user->id,
                        'approval'=>''
                    ]
                );
            }else{
                return '<script>alert("Gagal menambahkan Periksa kembali file anda");history.go(-1);</script>'; 
            }
            return redirect('/pengajuan-dosen');
        }
    }
    public function detail($id){
        $detail = DB::table('pengajuan')
                ->join('users', 'users.id', '=', 'pengajuan.dosen_id')
                ->where('pengajuan.id_pengajuan','=', $id)->get();
        
        return view('pages.pengajuan_dosen_pembimbing.detail',[
            'detail' => $detail
        ]);
    }
    public function approve($id){
        $detail = DB::table('pengajuan')
                ->join('users', 'users.id', '=', 'pengajuan.dosen_id')
                ->where('pengajuan.id_pengajuan','=', $id)
                ->update(['pengajuan.approval'=> '1']);
                
            return redirect('/proposal');
    }
    public function delete($id)
    {

        $detail = DB::table('pengajuan')
                ->join('users', 'users.id', '=', 'pengajuan.dosen_id')
                ->where('pengajuan.id_pengajuan','=', $id)->delete();

        return redirect('/pengajuan-dosen');
    }
}

