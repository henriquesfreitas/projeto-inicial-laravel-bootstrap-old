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
                                {!! Form::number('cnpj', $empresa->cnpj, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::text('email', $empresa->email, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('telefone', 'Telefone:') !!}
                                {!! Form::text('telefone', $empresa->telefone, ['class'=>'form-control', 'required']) !!}
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
@endsection