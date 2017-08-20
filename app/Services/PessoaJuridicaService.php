<?php

namespace App\Services;

use App\Repositories\EstadoRepository;
use App\Repositories\PessoaJuridicaRepository;

class PessoaJuridicaService
{
    private $pessoaJuridicaRepository;
    private $estadoRepository;

    public function __construct(PessoaJuridicaRepository $pessoaJuridicaRepository, EstadoRepository $estadoRepository)
    {
        $this->pessoaJuridicaRepository = $pessoaJuridicaRepository;
        $this->estadoRepository = $estadoRepository;
    }

    public function create(){
        return $this->pessoaJuridicaRepository->create($this->tratarEntrada());
    }

    public function update($pessoaJuridicaRepository){
        return $this->pessoaJuridicaRepository->update($pessoaJuridicaRepository, $this->tratarEntrada());
    }

    private function tratarEntrada(){
        return [
            'razao_social' => request('razao_social'),
            'nome_fantasia' => request('nome_fantasia'),
            'cnpj' => preg_replace("/[^0-9]/","",request('cnpj')),
            'nome_pessoa_contato' => request('nome_pessoa_contato'),
            'email' => request('email'),
            'telefone' => preg_replace("/[^0-9]/","",request('telefone')),
            'cep' => request('cep'),
            'logradouro' => request('logradouro'),
            'numero' => request('numero'),
            'bairro' => request('bairro'),
            'id_cidade' => request('cidade'),
        ];
    }

    public function getEstadoRepository() {
        return $this->estadoRepository;
    }

    public function setEstadoRepository($estadoRepository) {
        $this->estadoRepository = $estadoRepository;
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