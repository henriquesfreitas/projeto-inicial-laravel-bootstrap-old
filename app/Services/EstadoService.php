<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 28/7/2017
 * Time: 8:34 PM
 */

namespace App\Services;


use App\Repositories\EstadoRepository;

class EstadoService {

    private $estadoRepository;

    public function __construct(EstadoRepository $estadoRepository)
    {
        $this->estadoRepository = $estadoRepository;
    }

}