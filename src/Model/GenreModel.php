<?php
namespace Model;
use \Core\Entity;
use\Core\Database;
use \PDO;

class GenreModel extends entity
{
	public function adding()
	{
		//var_dump($this->param);
		$field = $this->param->newgenre;
 		$bdd = Database::connect();
		$sql = $bdd->prepare("INSERT INTO genre (nom) VALUES ('".$field."')");
      	$sql->execute();
 	}

 	public function modify()
	{
		//var_dump($this->param);
		$fields = array(
			'oldgenre' => $this->param->oldgenre,
 			'modifygenre' => $this->param->modifygenre);
		$bdd = Database::connect();
		$sql = $bdd->prepare("UPDATE genre SET nom ='".$fields['modifygenre']."' WHERE nom LIKE '".$fields['oldgenre']."'");
      	$sql->execute();
	}

 	public function listing()
	{
		//var_dump($this->param);
 		$field = $this->param->search;
 		$bdd = Database::connect();
		$sql = $bdd->prepare("SELECT*FROM genre INNER JOIN film ON genre.id_genre = film.id_genre WHERE nom LIKE '".$field."'");
      	$sql->execute();
      	return $sql->fetchall(PDO::FETCH_ASSOC);
 	}
}
?>