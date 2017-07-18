<?php 

use Acme\Eloquent\Repository;

namespace App\Repositories;

class ActorRepository extends Repository
{

	public function model()
	{
		return App\Actor::class;
	}

}