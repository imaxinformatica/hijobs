@extends('index.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')

<section class="search">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 search-job col-sm-offset-4">
                <h1>Login</h1>
                <form role="form" method="POST" action="{{ url('/candidato/login') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="email" class="n-icon" type="email" name="email" value="{{old('email')}}" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="password" class="n-icon" type="password" name="password" placeholder="Senha">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button class="btn-orange">
                                ENTRAR
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection