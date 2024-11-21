@extends('backend.layouts.master')
@section('title')
Tambah Data Reviews
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Data Review Film</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                <form role="form" action="{{ route('review.store') }}" method="post">
                    @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label for="film_id">Review Film</label>
                            <select class="form-control" id="film_id" name="film_id">
                                <option disabled selected>Pilih Film</option>
                                @foreach ($films as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                            @error('film_id')
                            <span class="text-danger">
                                <i class="fa fa-times-circle-o"></i> {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content Review</label>
                            <textarea class="form-control" id="content" name="content" rows="5"
                                placeholder="Masukkan content disini"></textarea>
                            @error('content')
                            <span class="text-danger">
                                <i class="fa fa-times-circle-o"></i> {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="point">Point</label>
                            <input type="number" class="form-control" id="point" name="point" min="1" max="10">
                            @error('point')
                            <span class="text-danger">
                                <i class="fa fa-times-circle-o"></i> {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-xs btn-flat btn-primary">
                                <i class="fa fa-save" aria-hidden="true"></i>
                                Simpan Data
                            </button>
                            <a href="{{ route('review.index') }}" class="btn btn-xs btn-flat btn-warning">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Kembali ke Home
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection
