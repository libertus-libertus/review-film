@extends('backend.layouts.master')
@section('title')
Ubah Data Film
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah Data Film</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                <form role="form" action="{{ route('film.update', $film->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $film->title }}" autofocus
                                placeholder="Title">
                            @error('title')
                            <span class="text-danger">
                                <i class="fa fa-times-circle-o"></i> {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="summary">Summary</label>
                            <textarea class="form-control" id="summary" name="summary" rows="5"
                                placeholder="Masukkan summary disini">{{ $film->summary }}</textarea>
                            @error('summary')
                            <span class="text-danger">
                                <i class="fa fa-times-circle-o"></i> {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Pembagian kolom inputan -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="release_year">Release Year</label>
                                    <input type="text" class="form-control" id="release_year" name="release_year"
                                        autofocus value="{{ $film->release_year }}" placeholder="Release year">
                                    @error('release_year')
                                    <span class="text-danger">
                                        <i class="fa fa-times-circle-o"></i> {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="genre_id">Genre</label>
                                    <select class="form-control" id="genre_id" name="genre_id">
                                        <option disabled selected>Pilih Genre Film</option>
                                        @forelse ($genre as $item)
                                            <!-- Apakah idnya sama atau tidak? -->
                                            @if ($item->id === $film->genre_id)
                                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @empty
                                        <option>Tidak ada genre</option>
                                        @endforelse
                                    </select>
                                    @error('genre_id')
                                    <span class="text-danger">
                                        <i class="fa fa-times-circle-o"></i> {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                        </div>
                        <div class="form-group">
                            <label for="poster">Upload Poster</label>
                            <input type="file" class="form-control" id="poster" name="poster">
                            @error('poster')
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
                            <a href="{{ route('film.index') }}" class="btn btn-xs btn-flat btn-warning">
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