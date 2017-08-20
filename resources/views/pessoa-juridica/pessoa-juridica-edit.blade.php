@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Incluir Empresa</div>

                    <div class="panel-body">
                        <div class="col-xs-10">

                            @include('layouts.errors')

                            {!! Form::open(['action'=>["EmpresaController@update",$empresa->id], 'method'=>'put']) !!}
                            <div class="form-group">
                                {!! Form::label('nome', 'Nome:') !!}
                                {!! Form::text('nome', $empresa->nome, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cnpj', 'CNPJ:') !!}
                                {!! Form::text('cnpj', $empresa->cnpj, ['class'=>'form-control cnpj', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::text('email', $empresa->email, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('telefone', 'Telefone:') !!}
                                {!! Form::text('telefone', $empresa->telefone, ['class'=>'form-control fone', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Alterar Empresa', ['class'=>'btn btn-primary']) !!}
                                <a href="{{ action("EmpresaController@index") }}" class="btn btn-default">Voltar</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script type="application/javascript">
            $('.cnpj').mask('00.000.000/0000-00', {reverse: false});
            var fone = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(fone.apply({}, arguments), options);
                    }
                };

            $('.fone').mask(fone, spOptions);
        </script>
@endsection