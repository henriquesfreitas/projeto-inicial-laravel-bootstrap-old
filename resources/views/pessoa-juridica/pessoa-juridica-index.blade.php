@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Empresa</div>

        <div class="panel-body">
            <p><a href="{{ action("PessoaJuridicaController@create") }}" class="btn btn-primary">Incluir Empresa</a></p>
            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Criação</th>
                    <th>Alterar</th>
                    <th>Remover</th>
                    </thead>
                    <tbody>
                    @foreach($listaPessoaJuridica as $pessoaJuridica)
                        <tr>
                            <td>{{ $pessoaJuridica->id }}</td>
                            <td>{{ $pessoaJuridica->nome }}</td>
                            <td class="cnpj">{{ $pessoaJuridica->cnpj }}</td>
                            <td>{{ $pessoaJuridica->email }}</td>
                            <td class="fone">{{ $pessoaJuridica->telefone }}</td>
                            <td>{{ $pessoaJuridica->created_at }}</td>
                            <td><a href="{{ action("PessoaJuridicaController@edit", ['pessoaJuridica'=>$pessoaJuridica->id]) }}" class="btn btn-xs btn-info">Alterar</a></td>
                            <td><a href="{{ action("PessoaJuridicaController@destroy", ['pessoaJuridica'=>$pessoaJuridica->id]) }}" class="btn btn-xs btn-danger" onclick="return confirm('{{ \Illuminate\Support\Facades\Lang::get('geral.aviso-remover') }}');">Remover</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $listaPessoaJuridica->links() }}
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
