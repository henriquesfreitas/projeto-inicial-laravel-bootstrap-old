@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ !empty($pessoaJuridica) ? 'Alterar Empresa' : 'Incluir Empresa' }}</div>

                    <div class="panel-body">
                        <div class="col-xs-7">

                            @include('layouts.errors')

                            @if(!empty($pessoaJuridica))
                                {!! Form::open(['action'=>["PessoaJuridicaController@update",$pessoaJuridica->id], 'method'=>'put']) !!}
                            @else
                                {!! Form::open(['action'=>'PessoaJuridicaController@store']) !!}
                            @endif

                            <div class="form-group col-xs-10">
                                {!! Form::label('nome_fantasia', 'Nome Fantasia:', ['class'=>'required']) !!}
                                {!! Form::text('nome_fantasia', !empty($pessoaJuridica) ? $pessoaJuridica->nome_fantasia : null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group col-xs-10">
                                {!! Form::label('razao_social', 'Razão Social:', ['class'=>'required']) !!}
                                {!! Form::text('razao_social', !empty($pessoaJuridica) ? $pessoaJuridica->razao_social : null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group col-xs-10">
                                {!! Form::label('cnpj', 'CNPJ:', ['class'=>'required']) !!}
                                {!! Form::text('cnpj', !empty($pessoaJuridica) ? $pessoaJuridica->cnpj : null, ['class'=>'form-control cnpj', 'required']) !!}
                            </div>
                            <div class="form-group col-xs-10">
                                {!! Form::label('nome_pessoa_contato', 'Pessoa de Contato:', ['class'=>'required']) !!}
                                {!! Form::text('nome_pessoa_contato', !empty($pessoaJuridica) ? $pessoaJuridica->nome_pessoa_contato : null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group col-xs-5">
                                {!! Form::label('telefone', 'Telefone:', ['class'=>'required']) !!}
                                {!! Form::text('telefone', !empty($pessoaJuridica) ? $pessoaJuridica->telefone : null, ['class'=>'form-control fone', 'required']) !!}
                            </div>
                            <div class="form-group col-xs-10">
                                {!! Form::label('email', 'Email:', ['class'=>'required']) !!}
                                {!! Form::text('email', !empty($pessoaJuridica) ? $pessoaJuridica->email : null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group col-xs-4">
                                {!! Form::label('cep', 'CEP:', ['class'=>'required']) !!}
                                {!! Form::text('cep', !empty($pessoaJuridica) ? $pessoaJuridica->cep : null, ['class'=>'form-control', 'maxlength="8" required']) !!}
                            </div>
                            <div class="form-group col-xs-10">
                                {!! Form::label('logradouro', 'Logradouro:', ['class'=>'required']) !!}
                                {!! Form::text('logradouro', !empty($pessoaJuridica) ? $pessoaJuridica->logradouro : null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group col-xs-4">
                                {!! Form::label('numero', 'Número:', ['class'=>'required']) !!}
                                {!! Form::text('numero', !empty($pessoaJuridica) ? $pessoaJuridica->numero : null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group col-xs-10">
                                {!! Form::label('bairro', 'Bairro:', ['class'=>'required']) !!}
                                {!! Form::text('bairro', !empty($pessoaJuridica) ? $pessoaJuridica->bairro : null, ['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group col-xs-10">
                                {!! Form::label('estado', 'Estado:', ['class'=>'required']) !!}
                                {!! Form::select('estado', $estados, !empty($idEstadoSelecionado) ? $idEstadoSelecionado : null, ['placeholder' => 'Escolha um Estado...', 'class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group col-xs-10">
                                {!! Form::label('cidade', 'Cidade:', ['class'=>'required']) !!}
                                {!! Form::select('cidade', $cidades, !empty($pessoaJuridica->id_cidade) && empty(old('id_cidade')) ? $pessoaJuridica->id_cidade : old('id_cidade'), ['placeholder' => 'Escolha uma Cidade...', 'class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group col-xs-10">
                                {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
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
            $.get('{{ action('EnderecoController@getCidades', ['idEstado'=>null]) }}/' + idEstado, function (cidades) {
                $('select[name=cidade]').empty();
                $.each(cidades, function (key, value) {
                    $('select[name=cidade]').append('<option value=' + value.id + '>' + value.nome + '</option>');
                });
            });
        });
    </script>
@endsection