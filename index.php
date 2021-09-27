<?php
//ROUTER ou DISPATCHER
define('WEBROOT',str_replace('index.php','',$_SERVER['REQUEST_URI']));
define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
//echo "WEBROOT:".WEBROOT.'<br>';
//echo "ROOT:".ROOT.'<br>';
require(ROOT.'config/conf.php');
require(ROOT.'core/model.php');
require(ROOT.'core/controller.php');
require(ROOT.'core/session.php');

if (isset($_GET['p']))
{
	$param = explode("/",$_GET['p']);
}
else
{
	$param=array();
}
/*echo "<pre>";
print_r($param);
echo "</pre>";*/
if (!empty($param[0]))
{
	$controller=$param[0];
}
else
	$controller="accueil";

if (!empty($param[1]))
{
	$action=$param[1];
}
else
{
	$action="index";
}

$chemin=explode("/",WEBROOT);

define('WEBROOT2',$chemin[1]);


//echo "controller:".$controller.'<br>';
//echo "action:".$action.'<br>';

require(ROOT.'controllers/'.$controller.'.php');

$controller=new $controller();

if(method_exists($controller,$action))
{
	//$controller->$action();
	unset($param[0]);
	unset($param[1]);
	call_user_func_array(array(($controller),($action)),$param);
}
else
{
	echo "erreur 404";
}


//define('WEBROOT',str_replace);
?>
