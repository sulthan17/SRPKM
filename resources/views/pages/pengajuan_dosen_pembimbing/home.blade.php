@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')
<section class="content-header" style="margin-bottom:20px">
      <h1>
        Pengajuan
        <small>Menu Pengajuan Dosen Pembimbing</small>
      </h1>
      <div class="breadcrumb">
        <a href="{{url('/pengajuan-dosen/tambah')}}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i>Tambah</a>
      </div>
    </section>
    <section class="content-body">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <!-- <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div> -->
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <table class="table table-condensed text-center"  id="example">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Judul Pengajuan</th>
                    <th>Nama Dosen</th>
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
                                <span class="label label-warning">di proses</span>
                            @endif
                        </td>
                        <td  width="50px">
                            <a  href="{{url('/pengajuan-dosen/detail/'.$item->id_pengajuan)}}" class="btn btn-xs btn-warning" >
                                    <i class="fa fa-info-circle"></i> Lihat</a>
                        </td>
                        <td  width="50px">
                            @if( $item->approval === '1')
                            <a  href="javascript:void(0)" 
                                    class="btn btn-xs btn-danger disabled">
                                    <i class="fa fa-trash"></i> Delete</a>
                            @else
                            <a  href="{{url('/pengajuan-dosen/delete/'.$item->id_pengajuan)}}" 
                                    class="btn btn-xs btn-danger" 
                                    onclick="if(confirm('Apakah Anda ingin Menghapus ?')){}else{return false;}">
                                    <i class="fa fa-trash"></i> Delete</a>
                            @endif
                        </td>
                    </tr>
                    @php($no++)
                @endforeach
            </tbody>
        </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </section>
@endsection

@section('footer_scripts')
@endsection
