<?php
namespace Model;
use \Core\Entity;
use\Core\Database;
use \PDO;

class FilmModel extends entity
{

 	public function allfilm()
	{
 		$bdd = Database::connect();
		$sql = $bdd->prepare("SELECT*FROM film");
      	$sql->execute();
      	return $sql->fetchall(PDO::FETCH_ASSOC);
 	}

	public function partfilm()
	{
		//var_dump($this->param);
		$field = $this->param->title;
 		$bdd = Database::connect();
		$sql = $bdd->prepare("SELECT*FROM film INNER JOIN genre ON genre.id_genre = film.id_genre WHERE titre like '".$field."'");
      	$sql->execute();
      	return $sql->fetchall(PDO::FETCH_ASSOC);
 	}

 	public function insertfilm ()
	{
		//var_dump($this->param);
		$fields = array(
			'filmgenre' => $this->param->filmgenre,
			'filmdistrib' => $this->param->filmdistrib,
			'filmtitle' => $this->param->filmtitle,
			'filmresum' => $this->param->filmresum,
			'filmdeb' => $this->param->filmdeb,
			'filmend' =>$this->param->filmend,
			'filmmin' => $this->param->filmmin,
			'filmprod' => $this->param->filmprod);
		$bdd = Database::connect();

		$query = $bdd->prepare("SELECT id_genre FROM genre WHERE nom LIKE '".$fields['filmgenre']."'");
      	$query->execute();
      	$genre =  $query->fetch();
      	$genre = $genre['id_genre'];

      	$query = $bdd->prepare("SELECT id_distrib FROM distrib WHERE nom LIKE '".$fields['filmdistrib']."'");
      	$query->execute();
      	$distrib =  $query->fetch();
      	$distrib = $distrib['id_distrib'];

		$sql = $bdd->prepare("INSERT INTO film (id_genre, id_distrib, titre, resum, date_debut_affiche, date_fin_affiche, duree_min, annee_prod) VALUES ('".$genre."', '".$distrib."', '".$fields['filmtitle']."', '".$fields['filmresum']."', '".$fields['filmdeb']."', '".$fields['filmend']."', '".$fields['filmmin']."', '".$fields['filmprod']."')");
      	$sql->execute();
    }
	
 	public function changefilm ()
 	{
 		//var_dump($this->param);
 		$fields = array(
			'filmname' => $this->param->filmname,
			'changegenre' =>$this->param->changegenre,
			'changeresum' =>$this->param->changeresum);
 		$bdd = Database::connect();
      	$query = $bdd->prepare("SELECT id_genre FROM genre WHERE nom LIKE '".$fields['changegenre']."'");
      	$query->execute();
      	$id =  $query->fetch();
      	$id = $id['id_genre'];
      	
		$sql = $bdd->prepare("UPDATE film SET id_genre = '".$id."', resum ='".$fields['changeresum']."' WHERE titre LIKE '".$fields['filmname']."'");
      	$sql->execute();
 	}
}
?>