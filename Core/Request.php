<?php
namespace Core;

class Request
{
	public function __construct()
	{
		foreach ($_REQUEST as $key => $value)
		{
			//$this->{$key} = $value;
			$this->{$key} = trim(stripslashes(htmlspecialchars($value)));
		}
	}
}