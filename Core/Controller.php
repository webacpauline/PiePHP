<?php
namespace Core;
//echo "recupère Core/Controler.php";

class Controller 
{
	private static $_render;

	public function __construct()
	{
        //$this->request = new request();
        //var_dump($this->request);
    }

	protected function render($view, $scope = [])
	{
 		extract($scope);
 		$f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';

 		//var_dump($f); affiche 'C:\wamp64\www\PiePHP\src\View\User\register.php' pour $view = register

 		if(file_exists($f))
 		{
 			//include fichier register.php
 			ob_start();//mise en cache
 			include($f);//prend fichier register.php
 			$view = ob_get_clean();// $view récupère contenu du fichier register.php
 			//var_dump ou echo $view; affiche contenu du fichier register.php

 			//include fichier index.php avec contenu fichier register.php à la pace de <?= $view...
 			ob_start();
 			include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View','index']).'.php');//prend fichier index.php
 			self::$_render = ob_get_clean();//$_render recupère contenu fichier index.php
 		}
	}

	public function __destruct()
 	{
 		echo self::$_render; //affiche contenu fichier index avec contenu fichier register
 	}
}
?>