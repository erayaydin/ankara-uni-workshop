



@extends('layout.master')

@section('title', 'Slayt Güncelle')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Slayt Güncelle</h3>
                    </div>
                    <div class="panel-body">

                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('my-slide.update', $slide->slug) }}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="PUT" />

                            <div class="form-group">
                                <label for="name">Başlık</label>
                                <input type="text" class="form-control" value="{{ old('name') ? old('name') : $slide->name }}" name="name" id="name">
                            </div>

                            <div class="form-group">
                                <label for="slug">Adres</label>
                                <input type="text" class="form-control" value="{{ old('slug') ? old('slug') : $slide->slug }}" name="slug" id="slug">
                            </div>

                            <div class="form-group">
                                <label for="description">Açıklama</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description') ? old('description') : $slide->description }}</textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Slayt Güncelle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop