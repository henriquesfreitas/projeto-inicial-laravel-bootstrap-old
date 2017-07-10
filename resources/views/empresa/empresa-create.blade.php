@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Incluir Empresa</div>

                    <div class="panel-body">
                        <div class="col-xs-10">

                            @include('layouts.errors')

                            {!! Form::open(['action'=>'EmpresaController@store']) !!}
                            <div class="form-group">
                                {!! Form::label('nome', 'Nome:') !!}
                                {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cnpj', 'CNPJ:') !!}
                                {!! Form::number('cnpj', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::text('email', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('telefone', 'Telefone:') !!}
                                {!! Form::text('telefone', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Incluir Empresa', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection