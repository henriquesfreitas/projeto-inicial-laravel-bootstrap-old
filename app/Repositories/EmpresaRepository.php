<?php

namespace App\Repositories;

use App\Models\Empresa;

class EmpresaRepository{

    public function all(){
        return Empresa::all();
    }

    public function create($novaEmpresa){
        return Empresa::create($novaEmpresa);
    }

}