@extends('admin.layouts.app')
@section('title', 'Admin')
@section('subtitle', 'Konten')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Konten</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('update.konten', $konten->id) }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="text" class="form-control" id="date" name="date"
                                        value="{{ old('date', $konten->date) }}" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $konten->title) }}" placeholder="Enter Your Detail">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_konten">Jenis Konten</label>
                                    <select name="jenis_konten_id" id="jenis_konten_id" class="form-control">
                                        @foreach ($data as $d)
                                            <option name="jenis_konten_id" value="{{ $d->id }}"
                                                {{ old('jenis_konten_id') ?? $d->jenis_konten_id == $d->id ? 'selected' : '' }}>
                                                {{ $d->jenis_konten }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        value="{{ old('code', $konten->code) }}" placeholder="Enter Your Code">
                                </div>
                                <div class="form-group">
                                    <label for="detail">Detail</label>
                                    <input type="text" class="form-control" id="detail" name="detail"
                                        value="{{ old('detail', $konten->detail) }}" placeholder="Enter Your Detail">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $konten->image) }}">
                                    <img src="{{ Storage::url('public/image/'.$konten->image) }}" class="img-fluid" width="100px" alt="error">
            
                                    @error('image')
                                        <div class="alert alert-danger mt-2">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="text" class="form-control" id="image" name="image"
                                        value="{{ old('image', $konten->image) }}" placeholder="Enter Your path">
                                </div> --}}
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="submit" class="btn btn-info"><a style="color: white"
                                        href="{{ route('data.konten') }}">Back</a></button>
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
