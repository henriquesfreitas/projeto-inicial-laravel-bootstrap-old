<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 23/7/2017
 * Time: 4:08 PM
 */

namespace App\Repositories;


abstract class AbstractRepository
{
    private $model;

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->orderBy('id','desc')->get();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function findAndUpdate(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function update($model, array $data)
    {
        return $model->update($data);
    }

    public function firstOrCreate(array $data)
    {
        return $this->model->firstOrCreate($data);
    }

    public function findAndDelete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function paginate($items = 10)
    {
        return $this->model->orderBy('id','desc')->paginate($items);
    }

}