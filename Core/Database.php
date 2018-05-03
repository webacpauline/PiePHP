<?php
namespace Core;
use \PDO;

class Database
{
	public static function connect()
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=pie;charset=utf8', 'root', '');
			return $bdd;
		}
		catch (Exception $e)
		{
        	die('Erreur : ' . $e->getMessage());
        }
	}
}

?>