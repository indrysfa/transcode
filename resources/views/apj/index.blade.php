@extends('admin.layouts.app')
@section('title', 'Admin')
@section('subtitle', 'Apj')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="col-lg-12">
        <a href="{{ route('form.apj') }}" class="nav-link">
            <button type="submit" class="btn btn-primary">Add New Karyawan</button>
        </a>
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
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Gaji</th>
                                        <th>Status Karyawan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->tgl_lahir }}</td>
                                        <td>{{ $d->gaji }}</td>
                                        <td>{{ $d->m_status->jenis_status }}</td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('detail.apj', $d->id) }}" class="btn btn-info"><i
                                                        class="fas fa-eye"></i></a>
                                                <a href="{{ route('edit.apj', $d->id) }}" class="btn btn-warning"><i
                                                        class="fas fa-pen"></i></a>
                                                <form action="{{ route('delete.apj', $d->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
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
@endsection
