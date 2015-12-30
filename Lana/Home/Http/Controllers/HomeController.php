<?php
namespace Lana\Home\Http\Controllers;
use App\Http\Controllers\Controller;

class HomeController extends Controller {
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('LanaHome::info.error');
	}
}
