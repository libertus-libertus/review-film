@extends('backend.layouts.master')
@section('title')
Detail data film
@endsection

@section('subTitle')
Detail Data Film
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Berikut detail film</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <img src="{{ asset('films/'.$film->poster) }}" alt="poster-film" width="100%">

                    <p class="text-muted">
                        <strong>Judul film: </strong> {{ $film->title }}<br>
                        <strong>Tahun rilis: </strong>{{ $film->release_year }} <br>
                        <strong>Genre: </strong>{{ $film->genre->name }} <br>
                        <strong>Summary film: </strong> {!! $film->summary !!}
                    </p>

                    <hr>
                    <a href="{{ route('film.index') }}" class="btn btn-xs btn-flat btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Kembali ke Home
                    </a>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@endsection