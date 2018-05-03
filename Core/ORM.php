<?php
namespace Core;
use\Core\Database;
use \PDO;

class ORM
{
	public function __construct()
	{
		//$this->bdd = new PDO('mysql:host=localhost;dbname=pie;charset=utf8', 'root', '');
		//$this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function identity($table, $fields)
	{
		$bdd = Database::connect();
		$sql = $bdd->prepare("SELECT id FROM ".$table." WHERE email LIKE '".$fields['mail']."' AND password LIKE '".$fields['password']."'");
      	$sql->execute();
      	return $sql->fetch(PDO::FETCH_ASSOC);
	}

	public function create ($table, $fields)
	{
		$bdd = Database::connect();
		$sql = $bdd->prepare("INSERT INTO ".$table." (email, password) VALUES ('".$fields['mail']."', '".$fields['password']."')");
      	$sql->execute();
      	$query = $bdd->prepare("SELECT id FROM ".$table." WHERE email LIKE '".$fields['mail']."' AND password LIKE '".$fields['password']."'");
      	$query->execute();
      	return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function read ($table, $id)
	{
		$bdd = Database::connect();
		$sql = $bdd->prepare("SELECT*FROM ".$table." WHERE id LIKE '".$id."'");
      	$sql->execute();
      	return $sql->fetch(PDO::FETCH_ASSOC);
	}

	public function update ($table, $id, $fields)
	{
		$bdd = Database::connect();
		$sql = $bdd->prepare("UPDATE ".$table." SET email='".$fields['newemail']."', password = '".$fields['newpassword']."' WHERE id LIKE '".$id."'");
      	$sql->execute();
	}

	public function delete ($table, $row, $field)
	{
		$bdd = Database::connect();
		$sql = $bdd->prepare("DELETE FROM ".$table." WHERE ".$row." LIKE '".$field."'");
      	$sql->execute();
	}

	public function find ($table, $params = array(
 	'WHERE' => '1',
 	'ORDER BY' => 'id ASC',
 	'LIMIT' => '')) 
 	{
 		$bdd = Database::connect();
		$sql = $bdd->prepare("SELECT*FROM ".$table." WHERE id LIKE '".$params."%' ");
      	$sql->execute();
      	return $sql->fetch(PDO::FETCH_ASSOC);
 	}
}
?>