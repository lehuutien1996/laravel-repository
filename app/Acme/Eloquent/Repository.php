<?php 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

use Acme\Contracts\RepositoryInterface;

namespace Acme\Eloquent;

abstract class Repository implements RepositoryInterface
{

	private $app;

	protected $model;

	public function __construct(App $app)
	{
		$this->app = $app;
		$this->makeModel();
	}

	public abstract function model();

	public function makeModel()
	{
		$model = $this->app->make($this->model());

		if (!$model instanceof Model) {
			throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
		}

		return $this->model = $model;

	}

	public function all($columns = ["*"])
	{
		return $this->model->get($columns);
	}

	public function paginate($perPage = 15, $columns = ["*"])
	{
		return $this->model->paginate($perPage, $columns);
	}

	public function create(array $data)
	{
		return $this->model->create($data);
	}

	public function update(array $data, $id, $attribute = "id")
	{
		$model = $this->model->where($attribute, $id)->first();
		if ( $model ) {
			$model->update($data);
		}
		return $model;
	}

	public function delete($id)
	{
		return $this->model->destroy($id);
	}

	public function find($id, $columns = ["*"])
	{
		return $this->model->find($id, $columns);
	}

	public function findBy($attribute, $value, $columns = ["*"])
	{
		return $this->model->where($attribute, $value)->first($columns);
	}

}