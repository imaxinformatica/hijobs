@extends('index.templates.default-empresa')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')

<section class="search">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 search-job col-sm-offset-4">
                <h1>Resetar Senha</h1>
                <form role="form" method="POST" action="{{ url('/candidato/password/reset') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="email" class="n-icon" type="text" name="email" placeholder="E-mail"
                                value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="password" type="password" class="n-icon" placeholder="Senha" name="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="password-confirm" type="password" placeholder="Confirmação Senha" class="n-icon"
                                name="password_confirmation">
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