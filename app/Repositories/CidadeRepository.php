<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 29/8/2017
 * Time: 8:13 PM
 */

namespace App\Repositories;


use App\Models\Cidade;

class CidadeRepository extends AbstractRepository {

    function __construct(Cidade $cidade)
    {
        parent::setModel($cidade);
    }

}