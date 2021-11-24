<style>div{transition: 300ms ease all;}</style>

<div class="h-screen w-full flex flex-col place-items-center justify-center">
  <i class="fas fa-arrow-down"></i>
  <div onclick="start()" class="h-64 w-64 lg:h-96 lg:w-96 flex flex-col place-items-center justify-center bg-black rounded-full filter saturate-200 cursor-pointer">
    <div id="wheel" class="w-5/6 h-5/6 flex flex-wrap">
    <div class="w-1/2 h-1/2 bg-yellow-400 rounded-tl-full transform hover:scale-150 hover:-translate-x-1/4 hover:-translate-y-1/4"></div>
    <div class="w-1/2 h-1/2 bg-blue-600 rounded-tr-full transform hover:scale-150 hover:translate-x-1/4 hover:-translate-y-1/4"></div>
    <div class="w-1/2 h-1/2 bg-red-600 rounded-bl-full transform hover:scale-150 hover:-translate-x-1/4 hover:translate-y-1/4"></div>
    <div class="w-1/2 h-1/2 bg-green-600 rounded-br-full transform hover:scale-150 hover:translate-x-1/4 hover:translate-y-1/4"></div>
  </div>
</div>
  <div id="color">Cliquez sur la roue</div>
</div>
<script>
var div = document.getElementById('wheel')
var deg=0
function start(){
    var max=getRandomInt(80000)
    for (let i = 0; i < max ; i++) {
      deg +=0.05
      div.style.transform = 'rotate('+deg+'deg)';
  }
  setTimeout(color,500);
}
function color(){
  if (deg%360<90){
    document.getElementById("color").innerHTML="jaune"
  }
  else if (deg%360<180){
    document.getElementById("color").innerHTML="rouge"
  }
  else if (deg%360<270){
    document.getElementById("color").innerHTML="vert"
  }
  else{
    document.getElementById("color").innerHTML="bleu"
  }
}
document.addEventListener('keyup', function(event)
{
	if (event.key=="Enter"){
		start()
	}
})
</script>
