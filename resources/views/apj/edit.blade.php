@extends('admin.layouts.app')
@section('title', 'Admin')
@section('subtitle', 'Apj')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('update.apj', $apj->id) }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ old('nama', $apj->nama) }}">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                        value="{{ old('tgl_lahir', $apj->tgl_lahir) }}">
                                </div>
                                <div class="form-group">
                                    <label for="gaji">Gaji</label>
                                    <input type="text" class="form-control" id="gaji" name="gaji" value="{{ old('date', $apj->gaji) }}">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_status">Status Karyawan</label>
                                    <select name="jenis_status_id" id="jenis_status_id" class="form-control">
                                        @foreach ($data as $d)
                                            <option name="jenis_status_id" value="{{ $d->id }}"
                                                {{ old('jenis_status_id') ?? $d->jenis_status_id == $d->id ? 'selected' : '' }}>
                                                {{ $d->jenis_status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="submit" class="btn btn-info"><a style="color: white"
                                        href="{{ route('data.apj') }}">Back</a></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                    <a href="http://indrysfa.com/" class="card-link">Website</a>
                    <a href="https://github.com/indrysfa" class="card-link">github</a>
                </div>
            </div>
        </div>
    </div>
@endsection
