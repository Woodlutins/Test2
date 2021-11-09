<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!--<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"></link>!-->
  <link rel="stylesheet" href="/<?php echo WEBROOT2?>/font/css/all.min.css"></link>
  <link href="/<?php echo WEBROOT2?>/css/style.css" rel="stylesheet"></link>
  <link href="/<?php echo WEBROOT2?>/css/tailwind.css" rel="stylesheet"></link>

<link rel="icon" type="image/png" sizes="16x16" href="https://pbs.twimg.com/media/Eww6V_xWgAQNEiW.jpg">
    <title>Site Test</title>
  </head>

  <body id="body" class="text-white">
<nav class="z-10 h-8 text-white bg-gradient-to-b from-red-800 to-pink-500 filter saturate-150">
  <div class="h-8 lg:hidden"></div>
  <ul id="scrollT" class="w-2/3 flex-col hidden lg:flex lg:flex-row">
  <li class="hidden flex-1 lg:flex"><a class="hover:text-black text-2xl" href="/<?php echo WEBROOT2?>/accueil"><i class="fas fa-home"></i></a></li>
    <li class="flex-1"><a class="hover:text-black cursor-pointer" onclick="WindowOpen('2')">LINK 2 <i class="fas fa-sort-down"></i></a>
      <div id="scroll2" class="hidden">
        <a href="/<?php echo WEBROOT2?>/exemples/tableau">Exemple de Tableau</a><br>
      </div>
    </li>
    <li class="flex-1"><a class="hover:text-black cursor-pointer" onclick="WindowOpen('3')">LINK 3 <i class="fas fa-sort-down"></i></a>
      <div id="scroll3" class="hidden">
        <a href="/<?php echo WEBROOT2?>/exemples/style">SuperTest</a>
      </div>
    </li>
    <li class="flex-1"><a class="hover:text-black cursor-pointer" onclick="WindowOpen('4')">LINK 4 <i class="fas fa-sort-down"></i></a>
      <div id="scroll4" class="hidden">
          <a href="/<?php echo WEBROOT2?>/exemples/wheel">Roue de la fortune</a>
      </div>
    </li>
    <li class="flex-1"><a class="hover:text-black cursor-pointer" onclick="WindowOpen('5')">LINK 5 <i class="fas fa-sort-down"></i></a>
      <div id="scroll5" class="hidden">
        <a href="/<?php echo WEBROOT2?>/exemples/test">Test</a><br>
      </div>
    </li>
    </ul>
    <span class="absolute top-0 lg:hidden"><a class="hover:text-black text-2xl" href="/<?php echo WEBROOT2?>/accueil"><i class="fas fa-home"></i></a></span>
      <span class="absolute right-10 top-0">
        <input class="h-8 outline-none text-black placeholder-yellow-700" placeholder="Recherche"></input>
          <button class="h-full" href="/"><i class="fas fa-search"></i></button>
      <?php
      if (isset($_SESSION['User']))
  		{
        echo '<span class="">'.$_SESSION["User"]->User.'</span>
        <a  href="/'.WEBROOT2.'/users/logout" class="text-xl hover:text-black"><i class="fas fa-sign-out-alt"></i></a>';
      }
      else
      {
        echo '<a class="h-full text-xl hover:text-black" href="/'.WEBROOT2.'/users"><i class="fas fa-user-plus"></i></a>';
      }
    ?>
      <a class="h-full text-xl hover:text-black lg:hidden" onclick="Scroll()"><i class="fas fa-bars"></i></a>
    </span>
</nav>
  <div class="bg-gradient-to-b from-blue-600 to-black">
		<?php
      echo $content_for_layout;
	   ?>
  </div>
</body>
<script>
var test=false
var testT=0
var blur=false
function WindowOpen(box){
  if (test==0){
    document.getElementById("scroll"+box).className="lg:bg-gray-400 lg:border-black lg:border-2 visible hover:text-black";
    test=box;
  }
  else if(test==box){
    document.getElementById("scroll"+box).className="hidden";
    test=0;
  }
  else {
    document.getElementById("scroll"+box).className="lg:bg-gray-400 lg:border-black lg:border-2 visible hover:text-black";
    document.getElementById("scroll"+test).className="hidden";
    test=box;
  }
}
function Scroll(){
  if (!testT){
    document.getElementById("scrollT").className="z-50 flex-col lg:flex-row lg:flex bg-gradient-to-b from-pink-500 to-pink-300 border-b"
    testT=true
  }
  else{
    document.getElementById("scrollT").className="h-full flex-col lg:flex-row hidden lg:flex"
    testT=false
  }
}
document.addEventListener('keyup', function(event)
{
  if (event.key=="b" && !blur){
    document.getElementById("body").className="filter blur-xl";
    blur=true;
  }
  else if (event.key=="b"){
    document.getElementById("body").className="text-white";
    blur=false;
  }
})
function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}
</script>
