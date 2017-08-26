<?php

namespace App\Services;

use App\Repositories\EstadoRepository;
use App\Repositories\PessoaJuridicaRepository;

class PessoaJuridicaService
{
    private $pessoaJuridicaRepository;

    public function __construct(PessoaJuridicaRepository $pessoaJuridicaRepository)
    {
        $this->pessoaJuridicaRepository = $pessoaJuridicaRepository;
    }

    public function getPessoaJuridicaRepository()
    {
        return $this->pessoaJuridicaRepository;
    }

    public function setPessoaJuridicaRepository($pessoaJuridicaRepository)
    {
        $this->pessoaJuridicaRepository = $pessoaJuridicaRepository;
    }
}