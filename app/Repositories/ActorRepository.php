<?php 

namespace App\Repositories;

use Acme\Eloquent\Repository;

class ActorRepository extends Repository
{

	public function model()
	{
		return 'App\Actor';
	}

}