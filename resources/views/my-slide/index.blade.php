



@extends('layout.master')

@section('title', 'Slaytlarım')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{ route('my-slide.create') }}" class="btn btn-success">Oluştur</a>
            </div>
        </div>
    <div class="row">
        @foreach($slides as $slide)
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $slide->name }}</h3>
                </div>
                <div class="panel-body">
                    {{ $slide->description }}
                </div>
                <div class="panel-footer text-center">
                    <a href="{{ route('slide.show', [$slide->slug]) }}" class="btn btn-success">Görüntüle</a>
                    <a href="{{ route('my-slide.edit', [$slide->slug]) }}" class="btn btn-warning">Düzenle</a>
                    <form action="{{ route('my-slide.destroy', $slide->slug) }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger">Sil</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        <div class="row">
            {!! $slides->render() !!}
        </div>
    </div>
@stop