<?php
namespace Core;

class TemplateEngine
{
	public function __construct()
	{
		//$this->file = "./src/View/User/firstindex.php";
		//$this->newfile = "./src/View/User/index.php";
	}

	public function get($file, $newfile)
	{
		$content = file_get_contents($file);
		//var_dump($content);
		
		$pattern = array(
		'/{{2}/', //{{2}([\$[a-z _]+)}{2}
		'/}{2}/',
		'/@if +\(([a-z(\[)\]$>=< \'\d]+)\)/',
		'/@elseif +\(([a-z(\[)\]$>=< \'\d]+)\)/',
		'/@else +/',
		'/@endif +/',
		'/@foreach +\(([\$a-z ]+)\)/',
		'/@endforeach +/',
		'/@isset +\(([\$a-z ]+)\)/',
		'/@endisset +/',
		'/@empty +\(([\$a-z ]+)\)/',
		'/@endempty +/');

		$replace = array(
		" <?php echo htmlspecialchars(",
		")?> ",
		"<?php if ($1): ?>",
		"<?php elseif ($1): ?>",
		"<?php else: ?>",
		"<?php endif; ?>",
		"<?php foreach ($1): ?>",
		"<?php endforeach; ?>",
		"<?php if (isset($1)): ?>",
		"<?php endif; ?>",
		"<?php if (empty($1)): ?>",
		"<?php endif; ?>");
		
		$newcontent = preg_replace($pattern, $replace, $content);
		//var_dump($newcontent);

		file_put_contents($newfile, $newcontent);
	}
}
?>