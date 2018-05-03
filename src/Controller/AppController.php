<?php
namespace Controller;
use \Core\Controller;
use \Core\Request;
use \Model\UserModel;

//var_dump("passe dans AppController.php");

class AppController extends Controller
{
	public function __construct()
	{
		//$request = new Request;
	}

	public function indexAction()
	{
		//var_dump("rentre dans indexAction");
		$this->render("app");
	}
}


?>