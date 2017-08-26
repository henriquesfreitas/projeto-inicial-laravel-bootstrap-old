<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 20/8/2017
 * Time: 5:19 PM
 */

namespace App\Services;


use App\Repositories\EstadoRepository;

class EnderecoService {

    private $estadoRepository;

    public function __construct(EstadoRepository $estadoRepository) {
        $this->estadoRepository = $estadoRepository;
    }

    public function popularEstadoCidadeInicial(){
        $cidades = array();
        if(!empty(old('estado'))) {
            $estado = $this->getEstadoRepository()->find(old('estado'));
            $cidades = $estado->getCidades()->pluck('nome','id');
        }
        return $cidades;
    }

    /**
     * @return EstadoRepository
     */
    public function getEstadoRepository() {
        return $this->estadoRepository;
    }

    /**
     * @param EstadoRepository $estadoRepository
     */
    public function setEstadoRepository($estadoRepository) {
        $this->estadoRepository = $estadoRepository;
    }

}