<?php

namespace Lana\Home\Http\Controllers;

use App\Http\Controllers\Controller;

class DefaultController extends Controller
{
	public function index()
	{
		return view("LanaHome::index");
	}
}