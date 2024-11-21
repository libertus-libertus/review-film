@extends('backend.layouts.master')
@section('title')
Detail data
@endsection

@section('subTitle')
    Detail Data
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Berikut detail cast</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i> {{ $cast->name }}</strong>
    
                  <p class="text-muted">
                    <strong>Umur: </strong>{{ $cast->age }} <br>
                    <strong>Biograph: </strong>{{ $cast->bio }}
                  </p>
    
                  <hr>
                  <a href="{{ route('cast.index') }}" class="btn btn-xs btn-flat btn-warning">
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