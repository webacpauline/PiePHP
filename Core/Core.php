<?php
namespace Core;

class Core 
{
	public function run()
	{
		include("routes.php");

		$url = $_SERVER['REQUEST_URI'];
		$array = explode("/", $url, 2);//supprime 1er slash : "/""
		$string = strstr($array[1], "/");//supprime dossier racine : "PiePHP"
		if(strpos($string, "?") !== false)
		{
			$newurl = strstr($string, "?", true);//supprime ? et après : "?page=3"
		}
		else
		{
			$newurl = $string;
		}
		$route = Router::get($newurl); //recupère contenu : key => value
		$value = array_values($route); //recupère que valeur : number => value

		$control = ucfirst($value[0])."Controller"; //1er value majuscule et Controller => nom de la class d'un fichier controller
		$method = $value[1]."Action";// 2ème value + Action => nom de la methode de cette class

		$control = "Controller\\$control";//chemin d'accès : nom du namespace \ nom de la class
		
		$obj = new $control; 
		$obj->$method();//envoi dans la méthode de la class d'un fichier controller
	}
}
?>