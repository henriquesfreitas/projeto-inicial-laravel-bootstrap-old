<?php

namespace App\Repositories;

use App\Models\PessoaJuridica;

class PessoaJuridicaRepository extends AbstractRepository {

    function __construct(PessoaJuridica $pessoaJuridica)
    {
        parent::setModel($pessoaJuridica);
    }

}