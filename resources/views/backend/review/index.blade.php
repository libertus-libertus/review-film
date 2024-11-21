@extends('backend.layouts.master')
@section('title')
Reviews
@endsection

@section('subTitle')
Seluruh Review Films
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
                    <a href="{{ route('review.create') }}" class="btn btn-xs btn-info">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Tambah Review
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table-data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Film</th>
                                <th>Review</th>
                                <th>Point</th>
                                <th>User</th>
                                <th class="text-center">
                                    @auth
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    Actions
                                    @endauth
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset('films/'.$item->film->poster) }}" width="100"> <br>
                                    Judul: {{ $item->film->title }} <br>
                                </td>
                                <td>{{ $item->content }}</td>
                                <td>{{ $item->point }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        @auth
                                        <form action="{{ route('review.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            <a href="{{ route('review.edit', $item->id) }}"
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
                                        @endauth
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
