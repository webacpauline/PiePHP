<?php
namespace Controller; 
use \Core\Controller;
use \Core\Request;
use \Model\GenreModel;
use \Core\TemplateEngine;

class GenreController extends Controller
{
	public function __construct()//recuperer genre ds input
	{
		$this->request = new Request;
	}

	public function addAction()
	{
		$params = $this->request;
		$genre = new GenreModel($params);
		$genre->adding();
		echo "genre ajouté";
	}

	public function listAction()
	{
		$params = $this->request;
		$genre = new GenreModel($params);
		$results = $genre->listing();
		//var_dump($results);

		$page = new TemplateEngine();
		$page->get("./src/View/Genre/genredetail.php", "./src/View/Genre/genre.php");
 		$this->render("genre", ['elements'=>$results]);
	}

	public function updateAction()
	{	
		$params = $this->request;
		$genre = new GenreModel($params);
		$genre->modify();
		echo "genre modifié";
	}

	public function deleteAction()
	{	
		$param = $this->request->supressgenre;
		$genre = new GenreModel($param);
		$genre->remove('genre', 'nom', $param);
		echo "genre supprimé";
	}
}
?>