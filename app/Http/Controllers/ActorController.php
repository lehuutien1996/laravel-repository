<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\ActorRepository as Actor;

class ActorController extends Controller
{

	protected $actor;

	public function __construct(Actor $actor)
	{
		$this->actor = $actor;
	}

	public function index()
	{
		return $this->actor->all();
	}

}
