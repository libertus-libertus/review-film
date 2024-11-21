@extends('backend.layouts.master')
@section('title')
Genres
@endsection

@section('subTitle')
Seluruh Data Genres
@endsection

@push('css')
<link rel="stylesheet"
    href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    @auth
                    <a href="{{ route('genre.create') }}" class="btn btn-xs btn-info">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Tambah Data
                    </a>
                    @endauth
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table-data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="7%">#</th>
                                <th>Name</th>
                                @auth
                                <th class="text-center">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    Actions
                                </th>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($genre as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                @auth
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('genre.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            <a href="{{ route('genre.edit', $item->id) }}"
                                                class="btn btn-xs btn-flat btn-warning">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                Update
                                            </a>

                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-xs btn-flat btn-danger"
                                                onclick="return confirm('Hapus genre film ini?')">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                @endauth
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<!-- Tambahkan SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- page script -->
<script>
    $(function () {
        $("#table-data").DataTable();
    });
</script>
@endpush
