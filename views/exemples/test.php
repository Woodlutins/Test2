<div class="flex flex-col justify-center place-items-center h-screen">
<div id="scroll" class="overflow-hidden h-5/6 border w-11/12" style="background-image:url('../stock/img/3.jpg');">
<div class="flex w-max h-full">
  <div class="w-screen"></div>
  <div class="w-screen bg-yellow-500 bg-opacity-50"></div>
  <div class="w-screen"></div>
  <div class="w-screen bg-red-500 bg-opacity-50"></div>
  <div class="w-screen"></div>
  <div class="w-screen bg-blue-500 bg-opacity-50"></div>
  <div class="w-screen"></div>
  <div class="w-screen bg-green-500 bg-opacity-50"></div>
  <div class="w-screen"></div>
</div>
</div>
</div>

<script>
window.onload= function(){
  function test(){
    document.getElementById("scroll").scrollLeft+=100;
    if (document.getElementById("scroll").scrollLeft>=15504)
    {
      document.getElementById("scroll").scroll(0,0)
    }
  }
  setInterval(test,1);
}
</script>
