



@extends('layout.master')

@section('title', 'Giriş Yap')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Giriş Yap</h3>
                    </div>
                    <div class="panel-body">

                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('auth.login') }}" method="post">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label for="email">E-Posta Adresi</label>
                                <input type="text" class="form-control" value="{{ old('email') }}" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label for="password">Parola</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Giriş Yap</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop