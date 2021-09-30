<?php
$d=array();
$ArUs=array();
foreach ($Users as $UnUs) {
	array_push($ArUs,strtolower($UnUs->User));
}
 ?>
 <div class="h-screen w-full flex flex-col justify-center place-items-center">
<form id="form" class="transiton duration-100 flex flex-col justify-center font-mono place-items-center bg-white text-blue-500 w-11/12 lg:w-1/4 md:w-1/2 rounded-3xl" action="/<?php echo WEBROOT2?>/users/create2" method="POST">
	<p class="h-10"></p>
	<p class="text-2xl">Création compte </p>
	<p id="showUser" class="h-10 text-xl text-blue-600"></p>
<p id="text" class="">Nom utilisateur</p>
	<p class="h-5"></p>
	<input id="InputUser" name="User" class="bg-blue-100 outline-none" maxlength="15"></input>
	<input id="InputMdp" name="Mdp" type="password" class="hidden"></input>
	<input id="InputMdp2" name="Mdp2" type="password" class="hidden"></input>
	<p id="red" class="h-10 text-red-500"></p>
	<div class="flex space-x-4">
	<button disabled id="l" type="button" class="h-10 w-10 border-2 border-blue-200 rounded-full text-blue-500 cursor-default"  onclick="arrowl()"><i class="fas fa-arrow-left"></i></button>
	<button id="r" type="button" class="h-10 w-10 border-2 border-blue-200 rounded-full text-blue-800 hover:bg-blue-200" onclick="arrowr()"><i class="fas fa-arrow-right"></i></button>
</div>
		<p class="h-10"></p>
</form>
</div>
<script>
var page=0;
var Ba="h-10 w-10 border-2 border-blue-200 rounded-full text-blue-800 hover:bg-blue-200"
var Bd="h-10 w-10 border-2 border-blue-200 rounded-full text-blue-500 cursor-default"
function arrowr(){
	if (document.getElementById("InputUser").value!=0){
		if  (document.getElementById("InputMdp").value==document.getElementById("InputMdp2").value || page!=2){
			if (!VerifUser())
			{
				document.getElementById("red").innerHTML="Nom d'utilisateurs déjà pris";
				setTimeout(clean,1000);
			}
			else {
					page+=1;
				document.getElementById("form").className="transiton duration-100 flex flex-col justify-center font-mono place-items-center bg-white text-blue-500 w-11/12 lg:w-1/4 md:w-1/2 rounded-3xl transform scale-0"
				setTimeout(grow,200);
			}
			}
			else{
				document.getElementById("red").innerHTML="Les deux mots de passe sont différents";
				setTimeout(clean,1000);
				document.getElementById("InputMdp").value="";
				document.getElementById("InputMdp2").value="";
				page=1;
				page0();
			}
		}
	else{
		document.getElementById("red").innerHTML="Saisir un nom d'utilisateur!";
		setTimeout(clean,1000);
	}
}
function arrowl(){
	page-=1
	document.getElementById("form").className="transiton duration-100 flex flex-col justify-center font-mono place-items-center bg-white text-blue-500 w-11/12 lg:w-1/4 md:w-1/2 rounded-3xl transform scale-0"
	setTimeout(grow,200);
}
function clean(){
		document.getElementById("red").innerHTML=""
}
function grow(){
		page0();
	document.getElementById('form').className="transiton duration-100 flex flex-col justify-center font-mono place-items-center bg-white text-blue-500 w-11/12 lg:w-1/4 md:w-1/2 rounded-3xl"
}
function page0(){
	if (page==0)
	{
		document.getElementById("text").innerHTML="Nom utilisateur";
		document.getElementById("InputMdp").className="hidden";
		document.getElementById("InputUser").className="bg-blue-100 outline-none";
		document.getElementById("InputUser").focus();
		document.getElementById("l").className=Bd;
		document.getElementById("l").disabled=true;
		document.getElementById("showUser").innerHTML=""
	}
	else if (page==1){
		document.getElementById("showUser").innerHTML=document.getElementById("InputUser").value;
		document.getElementById("text").innerHTML="Mot De Passe";
		document.getElementById("InputUser").className="hidden";
		document.getElementById("InputMdp").className="bg-blue-100 outline-none";
		document.getElementById("InputMdp").focus();
		document.getElementById("InputMdp2").className="hidden";
		document.getElementById("l").className=Ba;
		document.getElementById("l").disabled=false;
	}
	else if (page==2){
		document.getElementById("text").innerHTML="Confirmer Mot De Passe";
		document.getElementById("InputMdp").className="hidden";
		document.getElementById("InputMdp2").className="bg-blue-100 outline-none";
		document.getElementById("InputMdp2").focus();
	}
	else{
		document.forms["form"].submit();
	}
}
document.addEventListener('keyup', function(event)
{
	if (event.key=="Enter"){
				arrowr()
	}
})
function VerifUser(){
	var a = <?php echo json_encode($ArUs); ?>;
	if (a.indexOf(document.getElementById('InputUser').value.toLowerCase())==-1){
		return true;
	}
	else{
		return false;
	}
}
</script>
