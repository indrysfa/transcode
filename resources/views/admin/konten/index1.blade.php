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
                            <form action="{{ route('search.konten') }}" method="GET">

                                <input type="text" type="text" name="cari" aria-placeholder="Search Judul ..."
                                    value="{{ old('cari') }}" class="form-control float-right">
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
                                <table class="table table-bordered yajra-datatable">
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
@section('js.before')
    <script src="{{ asset('datatables/jquery-1.10.2.min.js') }}"></script>
    <script src="{{ asset('jquery.dataTables.min.js') }}"></script>
@endsection
@section('js.after')
    <script>
        $(function() {
            $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('getdata.konten') }}',
                columns: [{
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'jenis_konten_id',
                        name: 'jenis_konten_id'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'detail',
                        name: 'detail'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    }
                ]
            });
        });
    </script>
@endsection
{{-- @section('js.after')
    <!-- jQuery -->
    <script src="{{ asset('datatables/jquery-1.10.2.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('jquery.dataTables.min.js') }}"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! route('data1.konten') !!}",
                columns: [{
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'jenis_konten_id',
                        name: 'jenis_konten_id'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'detail',
                        name: 'detail'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endsection --}}
