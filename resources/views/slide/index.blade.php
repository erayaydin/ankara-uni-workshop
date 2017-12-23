



@extends('layout.master')

@section('title', 'Slaytlar')

@section('body')
    <div class="container">
    <div class="row">
        @foreach($slides as $slide)
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $slide->name }}</h3>
                </div>
                <div class="panel-body">
                    {{ $slide->description }}

                    <h4>Üye: <a href="{{ route('user.show', $slide->user->id) }}">{{ $slide->user->name }}</a></h4>
                </div>
                <div class="panel-footer text-center">
                    <a href="{{ route('slide.show', [$slide->slug]) }}" class="btn btn-success">Görüntüle</a>
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