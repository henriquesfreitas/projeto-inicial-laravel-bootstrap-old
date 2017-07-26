<?php

namespace App\Services;

use App\Repositories\EmpresaRepository;

class EmpresaService
{
    private $empresaRepository;

    public function __construct(EmpresaRepository $empresaRepository)
    {
        $this->empresaRepository = $empresaRepository;
    }

    public function create(){
        return $this->empresaRepository->create($this->tratarEntrada());
    }

    public function update($empresa){
        return $this->empresaRepository->update($empresa, $this->tratarEntrada());
    }

    private function tratarEntrada(){
        return [
            'nome' => request('nome'),
            'cnpj' => preg_replace("/[^0-9]/","",request('cnpj')),
            'email' => request('email'),
            'telefone' => preg_replace("/[^0-9]/","",request('telefone')),
        ];
    }

    public function getEmpresaRepository()
    {
        return $this->empresaRepository;
    }

    public function setEmpresaRepository($empresaRepository)
    {
        $this->empresaRepository = $empresaRepository;
    }
}