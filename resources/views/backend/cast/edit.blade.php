@extends('backend.layouts.master')
@section('title')
Ubah Data Casts
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah Data Cast Baru</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                <form role="form" action="{{ route('cast.update', $cast->id) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" autofocus value="{{ $cast->name }}" placeholder="Name">
                            @error('name')
                            <span class="text-danger">
                                <i class="fa fa-times-circle-o"></i> Name wajib diisi
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="age">Age (Umur)</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ $cast->age }}" placeholder="Age">
                            @error('age')
                            <span class="text-danger">
                                <i class="fa fa-times-circle-o"></i> Age wajib diisi
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bio">Biograph</label>
                            <textarea class="form-control" id="bio" name="bio" rows="5" placeholder="Masukkan bio disini">{{ $cast->bio }}</textarea>
                            @error('bio')
                            <span class="text-danger">
                                <i class="fa fa-times-circle-o"></i> Bio wajib diisi
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-xs btn-flat btn-primary">
                                <i class="fa fa-save" aria-hidden="true"></i>
                                Ubah Data
                            </button>
                            <a href="{{ route('cast.index') }}" class="btn btn-xs btn-flat btn-warning">
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
