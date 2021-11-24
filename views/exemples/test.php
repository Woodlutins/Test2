<div class="flex flex-col justify-center place-items-center h-screen">
<div id="scroll" class="overflow-hidden h-5/6 border w-11/12" style="background-image:url('../stock/img/1.jpg');">
<div class="flex w-max h-full">
  <div class="w-screen"></div>
  <div class="w-16 bg-black"></div>
  <div class="w-screen"><img class="object-fill h-full w-full" src="../stock/img/4.png"></img></div>
  <div class="w-16 bg-black"></div>
  <div class="w-screen"></div>
  <div class="w-16 bg-black"></div>
  <div class="w-screen"></div>
  <div class="w-16 bg-black"></div>
  <div class="w-screen"></div>
</div>
</div>
</div>

<script>
window.onload= function(){
  function test(){
    console.log(document.getElementById("scroll").scrollLeft)
    document.getElementById("scroll").scrollLeft+=100;
    if (document.getElementById("scroll").scrollLeft>=8100)
    {
      document.getElementById("scroll").scroll(0,0)
    }
  }
  setInterval(test,1);
}
</script>
