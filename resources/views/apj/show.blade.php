@extends('admin.layouts.app')
@section('title', 'Admin')
@section('subtitle', 'Apj')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form role="form" action="{{ route('add.apj') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}"
                            placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                            placeholder="Enter Your Date">
                    </div>
                    <div class="form-group">
                        <label for="gaji">Gaji</label>
                        <input type="text" class="form-control" id="gaji" name="gaji" value="{{ old('gaji') }}"
                            placeholder="Enter Your Gaji">
                    </div>
                    <div class="form-group">
                        <label for="jenis_status">Status Karyawan</label>
                        <select name="jenis_status_id" id="jenis_status_id" class="form-control">
                            @foreach ($data as $d)
                            <option value="{{ $d->id }}" {{ old('jenis_status_id') == "$d->jenis_status" ? selected : '' }}>
                                {{$d->jenis_status}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="submit" class="btn btn-danger"><a 
                            href="{{ route('data.apj') }}">Cancel</a></button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
