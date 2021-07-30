<?php


namespace App\Repositories;

use App\Interfaces\BaseInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
{
    /**
     * @var Model
     */
    private $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all() : Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id) : Model
    {
        return $this->model->find($id);
    }

    public function create(array $attributes) : Model
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, int $id) : bool
    {
        $this->model = $this->find($id);
        return $this->model->update($attributes);
    }

    public function delete(int $id) : bool
    {
        $this->model = $this->find($id);
       return $this->model->delete();
    }
}
