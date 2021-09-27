<?php
class controller
{
	var $vars=array();
	var $layout="default";

	function __construct()
	{
		if (isset($this->models))
		{
			foreach ($this->models as $m)
			{
				$this->loadmodel($m);
			}
		}
		$this->Session=new Session();
	}
	// fonction loadmodel
	function loadmodel($name)
	{
		//require (ROOT."models/".$name.".php");
		require (ROOT."models/".strtolower($name).".php");
		$this->$name=new $name();
	}

	function render($filename)
	{
		extract($this->vars);

		//j'utilise la mémoire tampon
		ob_start();

		require(ROOT.'views/'.get_class($this).'/'.$filename.'.php');
		$content_for_layout=ob_get_clean();

		if ($this->Session->isLogged() and $_SESSION['User']->Rang=="admin")
		{
			$this->layout="default";
		}
		else
		{
			$this->layout="default";
		}

		require(ROOT.'views/layout/'.$this->layout.'.php');
		//echo $this->layout;

	}
	function set ($d)
	{
		$this->vars=array_merge($this->vars,$d);
	}


}
?>
