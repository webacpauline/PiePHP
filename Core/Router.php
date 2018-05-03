<?php //The MVC router will parse the uri 
namespace Core;

class Router
{
	private static $routes;
	public static function connect($url, $route) 
 	{
 		self::$routes[$url] = $route;
 	}

 	public static function get($url)
 	{
		if(array_key_exists($url, self::$routes))
		{
			return self::$routes[$url];
		}
		else
		{
			//require "src/View/Error/404.php";
			//die;
			$url = str_replace($url, "/error/error", $url);
			return self::$routes[$url];
		}
 	}
}
?>