<?php

namespace App\Repositories;

use App\Models\Empresa;

class EmpresaRepository{

    public function all(){
        return Empresa::all();
    }

    public function create(){
        return Empresa::create($this->tratarEntrada());
    }

    public function update($empresa){
        return $empresa->update($this->tratarEntrada());
    }

    private function tratarEntrada(){
        return [
            'nome' => request('nome'),
            'cnpj' => preg_replace("/[^0-9]/","",request('cnpj')),
            'email' => request('email'),
            'telefone' => preg_replace("/[^0-9]/","",request('telefone')),
        ];
    }

}