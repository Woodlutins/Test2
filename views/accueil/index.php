<div class="h-screen w-full flex flex-col place-items-center justify-center">
<div class="text-4xl lg:text-7xl font-semibold">
  Accueil
</div>

<div class="h-8 "></div>
<div class="h-1/2 lg:h-2/3 relative w-11/12 md:w-5/6 lg:w-2/3">
  <img id="1" class="hidden" src="stock/img/1.jpg"></img>
  <img id="2" class="hidden" src="stock/img/2.jpg"></img>
  <img id="3" class="object-cover h-full w-full border-2 border-black rounded" src="stock/img/3.jpg"></img>

  <div class="absolute inset-y-0 h-full w-20 flex items-center justify-center cursor-pointer bg-opacity-0 bg-white hover:bg-opacity-50" onclick="arrowl()">
    <button id="l" type="button" class="h-10 w-10 text-gray-500 border-2 border-gray-500 rounded-full bg-white bg-opacity-50 lg:hidden"  onclick="arrowl()"><i class="fas fa-arrow-left"></i></button>
  </div>
  <div class="absolute inset-y-0 right-0 h-full w-20 flex items-center justify-center cursor-pointer bg-opacity-0 bg-white hover:bg-opacity-50" onclick="arrowr()">
    <button id="r" type="button" class="h-10 w-10 text-gray-500 border-2 border-gray-500 rounded-full bg-white bg-opacity-50 lg:hidden" onclick="arrowr()"><i class="fas fa-arrow-right"></i></button>
  </div>
</div>
</div>
<script>
window.addEventListener("load",function(){
   chg = setTimeout(arrowr,30000);
}
)
var img=3;
function arrowl(){
  img-=1
  img0()
}
function arrowr(){
  img+=1
  img0()
}
function img0(){
  document.getElementById("1").className="hidden"
  document.getElementById("2").className="hidden"
  document.getElementById("3").className="hidden"
switch (img)
{
  case 4:// +1 si nouvelles photo
      img=1
  case 1:
    document.getElementById("1").className="object-cover h-full w-full border-2 border-black rounded"
    break
  case 2:
    document.getElementById("2").className="object-cover h-full w-full border-2 border-black rounded"
    break
  case 0:
    img=3
  case 3: // plus  si nouvelles photo
    document.getElementById("3").className="object-cover h-full w-full border-2 border-black rounded"
    break// ajoutez le nouveau case
  }
  clearTimeout(chg)
  chg = setTimeout(arrowr,6000);
}
</script>
