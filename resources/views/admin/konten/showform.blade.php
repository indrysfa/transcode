@extends('admin.layouts.app')
@section('title', 'Admin')
@section('subtitle', 'Konten')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form role="form" action="{{ route('add.konten') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}"
                            placeholder="Enter Your Date">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                            placeholder="Enter Your title">
                    </div>
                    <div class="form-group">
                        <label for="jenis_konten">Jenis Konten</label>
                        <select name="jenis_konten_id" id="jenis_konten_id" class="form-control">
                            @foreach ($data as $d)
                            <option value="{{ $d->id }}" {{ old('jenis_konten_id') == "$d->jenis_konten" ? selected : '' }}>
                                {{$d->jenis_konten}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}"
                            placeholder="Enter Your code">
                    </div>
                    <div class="form-group">
                        <label for="detail">detail</label>
                        <input type="text" class="form-control" id="detail" name="detail" value="{{ old('detail') }}"
                            placeholder="Enter Your Detail">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">

                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="submit" class="btn btn-danger"><a 
                            href="{{ route('data.konten') }}">Cancel</a></button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
