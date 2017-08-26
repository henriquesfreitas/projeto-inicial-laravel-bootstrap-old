<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 20/8/2017
 * Time: 5:04 PM
 */

namespace App\Http\Controllers;


use App\Services\EnderecoService;

class EnderecoController extends Controller{

    private $enderecoService;

    public function __construct(EnderecoService $enderecoService) {
        $this->middleware('auth');
        $this->enderecoService = $enderecoService;
    }

    public function getCidades($idEstado)
    {
        $estado = $this->enderecoService->getEstadoRepository()->find($idEstado);
        return $estado->getCidades()->getQuery()->get(['id', 'nome']);
    }
}