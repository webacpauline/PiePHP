<?php
namespace Controller; 
use \Core\Controller;// importation d'une class d'un autre namespace
use \Core\Request;
use \Model\UserModel;
use \Core\TemplateEngine;

class UserController extends Controller
{
	public function __construct()
	{
		$this->request = new Request;
	}

	public function addAction()
	{	
		//var_dump("rentre dans addAction");
		$this->render("register");
	}

	public function logAction()
	{	
		//var_dump("rentre dans loginAction");
		$this->render("login");
	}

	public function registerAction()
	{
		$params = $this->request;
		if (empty($params->email))
		{
			echo "Champ mail vide";
		}
		elseif (empty($params->password))
		{
			echo "Champ password vide";
		}
		else
		{
			$user = new UserModel($params);
			if (!$user->id) 
			{
 				$results = $user->save();
 				$page = new TemplateEngine();
				$page->get("./src/View/User/firstindex.php", "./src/View/User/index.php");
 				$this->render("index", ['member' => $results]);
 			}
 			else
 			{
 				echo "Identifiants déja pris, recommencez avec un autre mail et password";
 				//var_dump("Mail déjà dans la base = user avec id");
 			}
 		}
 	}

	public function loginAction()
	{	
		$params = $this->request;
		$user = new UserModel($params);
		if ($user->id)
		{
			$results = $user->retrieve();
			$page = new TemplateEngine();
			$page->get("./src/View/User/firstindex.php", "./src/View/User/index.php");
			$this->render("index", ['member' => $results]);
		}
		else
 		{
 			echo "Echec de l'identification : personne innconnue";
 		}
	}

	public function updateAction()
	{	
		$params = $this->request;
		$user = new UserModel($params);
		$user->rescue();
		echo "compte modifié";
	}

	public function deleteAction()
	{	
		$param = $this->request->email;
		$user = new UserModel($param);
		$user->remove('users', 'email', $param);
		echo "compte supprimé";
	}
}
?>