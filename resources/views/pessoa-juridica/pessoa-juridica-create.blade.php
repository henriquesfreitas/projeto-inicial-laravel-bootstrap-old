@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Incluir Empresa</div>

                    <div class="panel-body">
                        <div class="col-xs-10">

                            @include('layouts.errors')

                            {!! Form::open(['action'=>'PessoaJuridicaController@store']) !!}
                            <div class="form-group">
                                {!! Form::label('nome_fantasia', 'Nome Fantasia:') !!}
                                {!! Form::text('nome_fantasia', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('razao_social', 'Razão Social:') !!}
                                {!! Form::text('razao_social', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cnpj', 'CNPJ:') !!}
                                {!! Form::text('cnpj', null, ['class'=>'form-control cnpj', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('nome_pessoa_contato', 'Pessoa de Contato:') !!}
                                {!! Form::text('nome_pessoa_contato', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::text('email', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('telefone', 'Telefone:') !!}
                                {!! Form::text('telefone', null, ['class'=>'form-control fone', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cep', 'CEP:') !!}
                                {!! Form::number('cep', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('logradouro', 'Logradouro:') !!}
                                {!! Form::text('logradouro', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('numero', 'Número:') !!}
                                {!! Form::text('numero', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('bairro', 'Bairro:') !!}
                                {!! Form::text('bairro', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('estado', 'Estado:') !!}
                                {!! Form::select('estado', $estados, null, ['placeholder' => 'Escolha um Estado...', 'class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cidade', 'Cidade:') !!}
                                {!! Form::select('cidade', $cidades, old('cidade'), ['placeholder' => 'Escolha uma Cidade...', 'class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Incluir Empresa', ['class'=>'btn btn-primary']) !!}
                                <a href="{{ action("PessoaJuridicaController@index") }}" class="btn btn-default">Voltar</a>
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

        $('select[name=estado]').change(function () {
            var idEstado = $(this).val();
            $.get('{{ action('PessoaJuridicaController@getCidades', ['idEstado'=>null]) }}/' + idEstado, function (cidades) {
                $('select[name=cidade]').empty();
                $.each(cidades, function (key, value) {
                    $('select[name=cidade]').append('<option value=' + value.id + '>' + value.nome + '</option>');
                });
            });
        });
    </script>
@endsection