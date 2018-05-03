<?php
namespace Controller; 
use \Core\Controller;// importation d'une class d'un autre namespace

//var_dump("passe dans ErrorController.php");

class ErrorController extends Controller
{
	public function errorAction()
	{
		$this->render("404");
	}
}
?>