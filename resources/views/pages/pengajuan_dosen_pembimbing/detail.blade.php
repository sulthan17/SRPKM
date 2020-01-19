@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')

                <div class="col-md-12" style="margin-top:30px">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="{{ URL::previous() }}" class="btn btn-default" >
                        Kembali
                    </a>
                    <div class="box-tools pull-right">
                        <!-- <h3 class="box-title"> Detail </h3> -->
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-6 justify-content-md-center">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                            <b>Nama Proposal</b> <a class="pull-right">{{$detail[0]->nama_proposal}}</a>
                            </li>
                            <li class="list-group-item">
                            <b>Dosen Pembimbing Yang di Pilih</b> <a class="pull-right">{{$detail[0]->first_name}} {{$detail[0]->last_name}}</a>
                            </li>
                        </ul>
                    </div>
                    @role('dosen')
                    <div class="col-md-6">
                        <form method="POST" action="{{ url('file/upload') }}" >
                        @csrf

                        <div class="form-group row">
                            <label for="komentar" class="col-sm-2 col-form-label text-md-right">Komentar</label>
                            <textarea id="komentar" cols="50" name="komentar"></textarea>
                        </div>
                            <button class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                    @endrole
                    <div class="col-md-12" style="margin-top:50px">
                        <iframe src="{{ asset('files/'.$detail[0]->file) }}" width="100%" height="500"></iframe>
                    </div>
                   
                </div>
            </div>
            </div>
@endsection

@section('footer_scripts')
@endsection
