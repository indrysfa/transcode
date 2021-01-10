@extends('admin.layouts.app')
@section('title', 'Halaman konten')
@section('subtitle', 'Detail konten')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Konten</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                 {{ $data->date }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                {{ $data->title }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_konten" class="col-sm-2 col-form-label">Jenis Konten</label>
                            <div class="col-sm-10">
                                {{ $data->m_konten->jenis_konten }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">Code</label>
                            <div class="col-sm-10">
                                <pre>{{ $data->code }}</pre>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                            <div class="col-sm-10">
                                {{ $data->detail }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detail" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <img src="{{ Storage::url('public/image/'.$data->image) }}" alt="error">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning"><a style="color: #060930"
                                href="{{ route('data.konten') }}">Back</a></button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>

            <div class="card-footer">
                <div class="text-right">
                    <a href="https://wa.me/62896916662700" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                    </a>
                    <a href="https://www.facebook.com/gaming/sailingtrap/" class="btn btn-sm bg-info">
                        <i class="fas fa-facebook"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
