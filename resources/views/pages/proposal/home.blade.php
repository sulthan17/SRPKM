@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')
<section class="content-header" style="margin-bottom:20px">
      <h1>
        Proposal
        <small>Daftar Proposal  Program Kreativitas Mahasiswa Yang Telah disetujui</small>
      </h1>
      <div class="breadcrumb">
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
                        <td>{{ $item->approval === '1' ? 'disetujui': 'ditolak' }}</td>
                        <td  width="50px">
                            <a  href="{{url('/pengajuan-dosen/detail/'.$item->id_pengajuan)}}" class="btn btn-xs btn-warning" >
                                    <i class="fa fa-info-circle"></i> Lihat</a>
                        </td>
                        <td  width="50px">
                            <a href="{{url('/download/'.$item->id_pengajuan)}}" class="btn btn-xs btn-default"><i class="fa fa-download"></i> Unduh</a>
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
