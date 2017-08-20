<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 28/7/2017
 * Time: 8:29 PM
 */

namespace App\Repositories;


use App\Models\Estado;

class EstadoRepository extends AbstractRepository {

    function __construct(Estado $estado)
    {
        parent::setModel($estado);
    }

    function retornarColecaoTodosEstados(){
        return Estado::pluck('nome','id');
    }


}