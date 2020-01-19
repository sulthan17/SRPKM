@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')
<section class="content-header" style="margin-bottom:20px">
      <h1>
        Log Book
        <small>Progress pengerjaan Program Kreativitas Mahasiswa</small>
      </h1>
      <div class="breadcrumb">
        @role('mahasiswa')
        <a href="" class="btn btn-xs btn-success"><i class="fa fa-plus"></i>Tambah</a>
        @endrole
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
                    <th>Judul</th>
                    <th>Progress</th>
                    <th>Nama Dosen</th>
                    <th>Status</th>
                    @role('mahasiswa')
                    <th colspan="2" width="50px">Aksi</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @php($no = 1)
                @foreach ($log_book as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->progress }} %</td>
                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                        @role('mahasiswa')
                        <td  width="50px">
                            <a href="" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i>Edit</a>
                        </td>
                        <td  width="50px">
                            <a  href="" 
                                    class="btn btn-xs btn-danger" 
                                    onclick="if(confirm('Apakah Anda ingin Menghapus ?')){}else{return false;}">
                                    <i class="fa fa-trash"></i>Delete</a>
                        </td>
                        @endrole
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
