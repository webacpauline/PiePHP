<?php
namespace Controller; 
use \Core\Controller;
use \Core\Request;
use \Model\FilmModel;
use \Core\TemplateEngine;

class FilmController extends Controller
{
	public function __construct()//recuperer genre ds input
	{
		$this->request = new Request;
	}

	public function filmAction()
	{
		$params = $this->request;
		$film = new FilmModel($params);
		$results = $film->allfilm();

		$page = new TemplateEngine();
		$page->get("./src/View/Film/filmall.php", "./src/View/Film/film.php");
 		$this->render("film", ['elements'=>$results]);
	}

	public function detailAction()
	{
		$params = $this->request;
		$film = new FilmModel($params);
		$results = $film->partfilm();

		$page = new TemplateEngine();
		$page->get("./src/View/Film/filmdetail.php", "./src/View/Film/film.php");
 		$this->render("film", ['elements'=>$results]);
	}

	public function addAction()
	{	
		$params = $this->request;
		$film = new FilmModel($params);
		$film->insertfilm();
		echo "film ajouté";
	}

	public function updateAction()
	{	
		$params = $this->request;
		$film = new FilmModel($params);
		$film->changefilm();
		echo "film modifié";
	}

	public function deleteAction()
	{	
		$param = $this->request->supressfilm;
		$genre = new FilmModel($param);
		$genre->remove('film', 'titre', $param);
		echo "film supprimé";
	}
}