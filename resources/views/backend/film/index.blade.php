@extends('backend.layouts.master')
@section('title')
Films
@endsection

@section('subTitle')
Seluruh Data Films
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
                    <a href="{{ route('film.create') }}" class="btn btn-xs btn-info">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Tambah Data
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table-data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="7%">#</th>
                                <th>Title</th>
                                <th>Poster</th>
                                <th>Release Year</th>
                                <th>Genre</th>
                                <th class="text-center">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($film as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <img src="{{ asset('films/'. $item->poster) }}" width="120">
                                </td>
                                <td>{{ $item->release_year }}</td>
                                {{-- <td>{{ $item->genre->name }}</td> --}}
                                <td>{{ $item->genre->name ?? 'Tidak Ada Genre' }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('film.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            <a href="{{ route('film.show', $item->id) }}"
                                                class="btn btn-xs btn-flat btn-info">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                Detail
                                            </a>
                                            <a href="{{ route('film.edit', $item->id) }}"
                                                class="btn btn-xs btn-flat btn-warning">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                Update
                                            </a>

                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-xs btn-flat btn-danger"
                                                onclick="return confirm('Hapus cast ini?')">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                Delete
                                            </button>
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