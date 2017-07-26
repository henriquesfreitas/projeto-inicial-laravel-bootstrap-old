<?php

namespace App\Repositories;

use App\Models\Empresa;

class EmpresaRepository extends AbstractRepository {

    function __construct(Empresa $empresa)
    {
        parent::setModel($empresa);
    }

}