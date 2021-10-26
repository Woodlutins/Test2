<?php
class accueil extends controller
{
	function index()
	{
		/*mkdir("test");
		fopen('test/test.php','w');
		$a=fopen('test.php','a');
		fwrite($a,"J\nJ\nJ");
		fclose($a);
		$r= fopen( "test.php", "r" );
		$content="";
		while(!feof($r)){
			$content.=fgets($r,4096);
		}
		echo $content;
		fclose($r);*/
		
		$this->render('index');
	}
}
?>
