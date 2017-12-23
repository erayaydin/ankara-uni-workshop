



@extends('layout.master')

@section('title', 'Kullanıcılar')

@section('body')
    <div class="container">
    <div class="row">
        @foreach($users as $user)
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <p>Toplam Slayt Sayısı: {{ $user->slides->count() }}</p>
                </div>
                <div class="panel-footer text-center">
                    <a href="{{ route('user.show', [$user->id]) }}" class="btn btn-success">Görüntüle</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        <div class="row">
            {!! $users->render() !!}
        </div>
    </div>
@stop