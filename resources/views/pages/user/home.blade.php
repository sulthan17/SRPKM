@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')
<section class="content-header">
    <h1>
        Dashboard
        <!-- <small>Version 2.0</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$pengajuan_baru}}</h3>
                    <p>Pengajuan Baru</p>
                </div>
                <div class="icon">
                    <i class="fa fa-paper-plane"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$pengajuan_disetujui}}</h3>
                    <p>Proposal Lolos Seleksi</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$pengajuan_ditolak}}</h3>
                    <p>Proposal Yang Ditolak</p>
                </div>
                <div class="icon">
                    <i class="fa fa-dollar"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>0</h3>
                    <p>Penelitian Lolos ke PIMNAS</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    @role('dosen')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Notification Daftar Pengajuan Program Kreativitas Mahasiswa</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        <table class="table table-condensed text-center"  id="example">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Judul Pengajuan</th>
                    <th>Nama Mahasiswa</th>
                    <th>Status</th>
                    <th colspan="2" width="50px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php($no = 1)
                @foreach ($pengajuan as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama_proposal }}</td>
                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                        <td>@if($item->approval === '1') 
                                <span class="label label-success">disetujui</span>
                            @elseif($item->approval === '0')
                                <span class="label label-danger">di tolak</span>
                            @else
                                <span class="label label-warning">Menunggu Persetujuan</span>
                            @endif
                        </td>
                        <td  width="50px">
                            <a  href="{{url('/pengajuan-dosen/detail/'.$item->id_pengajuan)}}" class="btn btn-xs btn-warning" >
                                    <i class="fa fa-info-circle"></i> Lihat</a>
                        </td>
                        <td  width="50px">
                            <a  href="{{url('/pengajuan-dosen/approve/'.$item->id_pengajuan)}}" 
                                    class="btn btn-xs btn-success" 
                                    onclick="if(confirm('Apakah Anda Yakin ?')){}else{return false;}">
                                    <i class="fa fa-check"></i> Approve</a>
                        </td>
                    </tr>
                    @php($no++)
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    @endrole
    <h3> Informasi </h3>
    @role('mahasiswa')
    @foreach ($informasi as $item)
    <div class="box box-default card mb-4">
          <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
          <div class="card-body">
            <h2 class="card-title">{{$item->nama_informasi}}</h2>
            <p class="card-text">
                {{$item->deskripsi}}
            </p>
            <a href="#" class="btn btn-primary">Read More →</a>
          </div>
        </div>
    @endforeach
    @endrole
</section>

@endsection

@section('footer_scripts')
@endsection
