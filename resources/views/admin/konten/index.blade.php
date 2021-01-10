@extends('admin.layouts.app')
@section('title', 'Admin')
@section('subtitle', 'Konten')
@section('content')
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <div class="col-lg-12">
            <a href="{{ route('form.konten') }}" class="nav-link">
                <button type="submit" class="btn btn-primary">Add New Konten</button>
            </a>
            <div class="card">
                {{-- <form action="/pegawai/cari" method="GET">
                    <input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">
                </form> --}}
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <form action="{{route('search.konten')}}" method="GET">
                                
                                <input type="text" type="text" name="cari" aria-placeholder="Search Judul ..." value="{{old('cari')}}" class="form-control float-right">
                                <input type="submit" value="CARI">
                                {{-- <div class="input-group-append">
                                    <button type="submit" value="CARI" class="bztn btn-default"><i class="fas fa-search"></i></button>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>


                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Files</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Title</th>
                                            <th>Jenis Konten</th>
                                            <th>Code</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->id }}</td>
                                            <td>{{ $d->date }}</td>
                                            <td>{{ $d->title }}</td>
                                            <td>{{ $d->m_konten->jenis_konten }}</td>
                                            <td>{{ $d->code }}</td>
                                            <td><img src="{{ Storage::url('public/image/'.$d->image) }}" width="50px" height="50px" alt="error"></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('detail.konten', $d->id) }}" class="btn btn-info"><i
                                                            class="fas fa-eye"></i></a>
                                                    <a href="{{ route('edit.konten', $d->id) }}" class="btn btn-warning"><i
                                                            class="fas fa-pen"></i></a>
                                                    <form action="{{ route('delete.konten', $d->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        {{-- <tr>{{ $d->paginate(5) }}</tr> --}}
                                    </tbody>
                                   
 
 
	
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
@endsection
