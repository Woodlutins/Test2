<div class="h-screen w-full flex flex-col justify-center place-items-center">
<form class="flex flex-col place-items-center font-mono w-11/12 sm:w-5/6 md:w-3/4 lg:w-2/3 xl:w-1/2 bg-white text-blue-500 rounded-3xl shadow-inner-xl" action="/<?php echo WEBROOT2?>/users/connexion" method="POST">
	<div class="h-10"></div>
	<p class="text-2xl">Connexion</p>
	<div class="h-5"></div>
	<input id="user" name="User" class=" w-3/4 h-10 text-blue-500 border-b border-blue-200 outline-none placeholder-blue-300" placeholder="Nom Utilisateur" maxlength="15"></input>
	<input type="password" id="mdp" name="Mdp" class="w-3/4 h-10 text-blue-500 outline-none placeholder-blue-300" placeholder="Mot De Passe"></input>
	<i class="far fa-eye cursor-pointer" id="eye" onclick="ShowPW()"></i>
	<div class="h-5"></div>
	<p class="text-sm">Creéz un compte <a class="text-blue-900 hover:text-pink-800" href="/<?php echo WEBROOT2?>/users/create">ici</a></p>
		<div class="h-3"></div>
<button class="bg-white border-blue-200 border-2 w-28 h-10 rounded-lg text-blue-500 hover:bg-blue-200">Valider</button>
<div class="h-5"></div>
</form>
</div>
<script>
var Show=false
function ShowPW(){
	if (Show){
		document.getElementById("mdp").type="password"
		document.getElementById("eye").className="far fa-eye cursor-pointer"
		Show=false
	}
	else {
		document.getElementById("mdp").type=""
		document.getElementById("eye").className="far fa-eye-slash cursor-pointer"
		Show=true
	}
}
</script>
