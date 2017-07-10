@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Empresa</div>

                    <div class="panel-body">
                        <div class="col-xs-10">
                            <p><a href="{{ action("EmpresaController@create") }}" class="btn btn-primary">Incluir Empresa</a></p>
                            <table class="table table-striped">
                                <thead>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>CNPJ</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Criação</th>
                                </thead>
                                <tbody>
                                @foreach($empresas as $empresa)
                                    <tr>
                                        <td>{{ $empresa->id }}</td>
                                        <td>{{ $empresa->nome }}</td>
                                        <td>{{ $empresa->cnpj }}</td>
                                        <td>{{ $empresa->email }}</td>
                                        <td>{{ $empresa->telefone }}</td>
                                        <td>{{ $empresa->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
