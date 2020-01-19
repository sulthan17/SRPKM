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
                    <h3 class="box-title">Form Pengajuan Program Kreativitas Mahasiswa</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <form method="POST" action="{{ url('file/upload') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label text-md-right">Judul</label>
                            <div class="col-md-8">
                                <input  id="judul" 
                                        type="text" 
                                        class="form-control{{ $errors->has('nama_proposal') ? ' is-invalid' : '' }}" 
                                        name="nama_proposal" required autofocus>

                                @if ($errors->has('nama_proposal'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama_proposal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Dosen Pembimbing</label>

                            <div class="col-md-8">
                                <select class="form-control {{ $errors->has('dosen_id') ? ' is-invalid' : '' }}" 
                                        name="dosen_id" id="dosen_id" required>
                                    <option value="" selected="">--pilih--</option>
                                    @foreach ($dosen_list as $item)
                                    <option value="{{ $item->id }}">{{ $item->first_name }} {{ $item->last_name }} </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('dosen_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dosen_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file" class="col-md-2 col-form-label text-md-right">Upload File</label>

                            <div class="col-md-8">
                                <input id="file" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" accept="application/pdf" required>
                                <span class="invalid-feedback">
                                        <strong>*hanya pdf (maksimum upload: 2MB)</strong>
                                </span>
                                @if ($errors->has('file'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Simpan
                                </button>
                                
                                <a class="btn btn-link" href="{{ url('/pengajuan-dosen') }}">
                                    Kembali
                                </a>
                            
                            </div>
                     
                        </div> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('footer_scripts')
@endsection
