<div class="h-screen w-full flex flex-col place-items-center justify-center">

<div class=" flex h-16 w-11/12 border-black border-8 rounded filter saturate-200">
<div id="1"></div><div id="2"></div></div>

<div class="h-8"></div>

<div class=" flex h-16 w-11/12 border-black border-8 rounded filter saturate-200">
<div id="11"></div><div id="12"></div><div id="13"></div></div>

<div class="h-8"></div>

<div class=" flex h-16 w-11/12 border-black border-8 rounded filter saturate-200">
<div id="21"></div><div id="22"></div><div id="23"></div><div id="24"></div></div>

</div>
<script>
var len1=1
var len2=11
var color1="blue"
var color2="pink"

var len11=1
var len13=5
var color11="blue"
var color12="green"
var color13="red"

var len21=1
var len24=3
var color21="pink"
var color22="yellow"
var color23="purple"
var color24="indigo"

let colorList=["blue","pink","yellow","green","purple","red","gray","indigo"]

window.addEventListener("load",function(){
   move2();
   move3();
   move4();
})
function move2()
{
  len1+=1;
  len2=12-len1;
  if (len1==12) {
    len1=1
    len2=11
    color2=color1
    color1=colorList[getRandomInt(8)]
  }
  document.getElementById("1").className="h-full bg-"+color1+"-600 w-"+len1+"/12";
  document.getElementById("2").className="h-full bg-"+color2+"-600 w-"+len2+"/12";
  setTimeout(move2,200);
}
function move3()
{
  len11+=1
  len13=6-len11
  if (len11==7)
  {
    len11=1
    len13=len13=6-(len11)
    color13=color12
    color12=color11
    color11=colorList[getRandomInt(8)]
  }
  document.getElementById("11").className="h-full bg-"+color11+"-600 w-"+len11+"/12";
  document.getElementById("12").className="h-full bg-"+color12+"-600 w-6/12";
  document.getElementById("13").className="h-full bg-"+color13+"-600 w-"+len13+"/12";
  setTimeout(move3,200);
}
function move4()
{
  len21+=1
  len24=4-len21
  if (len21==5)
  {
    len21=1
    len24=4-(len21)
    color24=color23
    color23=color22
    color22=color21
    color21=colorList[getRandomInt(8)]
  }
  document.getElementById("21").className="h-full bg-"+color21+"-600 w-"+len21+"/12";
  document.getElementById("22").className="h-full bg-"+color22+"-600 w-4/12";
  document.getElementById("23").className="h-full bg-"+color23+"-600 w-4/12";
  document.getElementById("24").className="h-full bg-"+color24+"-600 w-"+len24+"/12";
  setTimeout(move4,200);
}
</script>
