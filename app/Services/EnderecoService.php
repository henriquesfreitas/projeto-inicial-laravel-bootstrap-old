<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 20/8/2017
 * Time: 5:19 PM
 */

namespace App\Services;


use App\Repositories\CidadeRepository;
use App\Repositories\EstadoRepository;

class EnderecoService {

    private $estadoRepository, $cidadeRepository;

    public function __construct(EstadoRepository $estadoRepository, CidadeRepository $cidadeRepository) {
        $this->estadoRepository = $estadoRepository;
        $this->cidadeRepository = $cidadeRepository;
    }

    public function popularEstadoCidadeInicial($id_estado = null){
        $cidades = array();

        if(!empty($id_estado)) {
            $estado = $this->getEstadoRepository()->find($id_estado);
            $cidades = $estado->cidades()->pluck('nome','id');
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

    /**
     * @return CidadeRepository
     */
    public function getCidadeRepository() {
        return $this->cidadeRepository;
    }

    /**
     * @param CidadeRepository $cidadeRepository
     */
    public function setCidadeRepository($cidadeRepository) {
        $this->cidadeRepository = $cidadeRepository;
    }

}