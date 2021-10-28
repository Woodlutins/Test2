<style>
div{
  transition: 300ms ease all;
}
</style>
NKI101300140378A7C6301

<div class="h-screen w-full flex flex-col place-items-center justify-center">
  <i class="fas fa-arrow-down"></i>

<div onclick="start()" class="h-96 w-96 flex flex-col place-items-center justify-center bg-black rounded-full filter saturate-200">
<div id="wheel" class="w-5/6 h-5/6 flex flex-wrap">
<div class="w-1/2 h-1/2 bg-white rounded-tl-full"></div><div class="w-1/2 h-1/2 bg-blue-700 rounded-tr-full"></div>
<div class="w-1/2 h-1/2 bg-red-700 rounded-bl-full"></div><div class="w-1/2 h-1/2 bg-green-700 rounded-br-full"></div>
</div>
</div>
<div id="text"></div>
<div id="color"></div>
</div>
<script>
var div = document.getElementById('wheel')
var deg=0
window.addEventListener("load",function(){
  show()
})
function start(){
    for (let i = 0; i < 9500+getRandomInt(1000); i++) {
      deg +=0.05
      div.style.transform       = 'rotate('+deg+'deg)';
  }
}
function show(){
  color()
  document.getElementById("text").innerHTML=deg
  setTimeout(show,2000);
}
function color(){
  if (deg%360<90){
    document.getElementById("color").innerHTML="blanc"
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
</script>
