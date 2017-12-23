



@extends('layout.master')

@section('title', 'Yeni Slayt Oluştur')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Yeni Slayt oluştur</h3>
                    </div>
                    <div class="panel-body">

                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('my-slide.store') }}" method="post">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label for="name">Başlık</label>
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name">
                            </div>

                            <div class="form-group">
                                <label for="slug">Adres</label>
                                <input type="text" class="form-control" value="{{ old('slug') }}" name="slug" id="slug">
                            </div>

                            <div class="form-group">
                                <label for="description">Açıklama</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Slayt Oluştur</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop