<?php
$d=array();
 ?>
 <div class="h-screen w-full flex flex-col justify-center place-items-center">
<form id="form" class="flex flex-col place-items-center font-mono w-11/12 md:w-1/2 bg-white text-blue-500 rounded-3xl" action="/<?php echo WEBROOT2?>/exemples/tableauformSubmit" method="POST">
<div class="h-8"></div>
<div class="text-xl">Ajout</div>
<div class="h-4"></div>
<?php
  foreach ($champs as $unChamps)
  {
    if ($unChamps->ORDINAL_POSITION!="2")
      echo "<div id='".$unChamps->ORDINAL_POSITION."' class='hidden'>";
    else{
      echo "<div id='".$unChamps->ORDINAL_POSITION."' class='flex flex-col place-items-center w-full'>";
    }
    if ($unChamps->COLUMN_KEY!="PRI" and $unChamps->EXTRA!="auto_increment"){
      echo $unChamps->COLUMN_NAME;
      switch ($unChamps->DATA_TYPE) {
        case "date":
          echo "<input class='border-blue-500 border rounded ' type='date'></input>";
          break;
        case "tinyint":
          echo "<input class='border-blue-500 border rounded' type='checkbox'></input>";
          break;
        case 'int':
          if ($unChamps->COLUMN_KEY=="MUL")
          {
            $Et=$unChamps->COLUMN_NAME;
            echo "<select class='border-blue-500 border rounded'><option selected>Selection</option>";
              foreach ($$Et as $unEt) {
                echo "<option>".$unEt->Libelle."</option>";
              }
              echo "</select>";
          }
          else{
            echo "<input type='number' class='border-blue-500 border rounded' oninput='this.value = this.value.replace(/[^0-9.]/g, ``).replace(/(\..*)\./g, `$1`);'></input>";
          }
          break;
        case 'varchar':
        default:
          echo "<textarea class='border-blue-500 border rounded w-3/4' type='textarea'></textarea>";
          break;
      }
    }
    echo "</div>";
  }
 ?>
 <div class="h-4"></div>
<div class="flex space-x-4">
<button disabled id="l" type="button" class="h-10 w-10 border-2 border-blue-200 rounded-full text-blue-500 cursor-default"  onclick="arrowl()"><i class="fas fa-arrow-left"></i></button>
<button id="r" type="button" class="h-10 w-10 border-2 border-blue-200 rounded-full text-blue-800 hover:bg-blue-200" onclick="arrowr()"><i class="fas fa-arrow-right"></i></button>
</div>
<div class="h-4"></div>
</form>
</div>
<script>
var page=2
var finalpage=<?php echo count($champs)?>

function arrowr(){
  page+=1
  document.getElementById("form").className="transiton duration-100 flex flex-col justify-center font-mono place-items-center bg-white text-blue-500 w-11/12 lg:w-1/4 md:w-1/2 rounded-3xl transform scale-0"
	setTimeout(grow,200);
}
function arrowl(){
  page-=1
  document.getElementById("form").className="transiton duration-100 flex flex-col justify-center font-mono place-items-center bg-white text-blue-500 w-11/12 lg:w-1/4 md:w-1/2 rounded-3xl transform scale-0"
	setTimeout(grow,200);
}

function page0(){

  if (page==2){
    document.getElementById('l').className="h-10 w-10 border-2 border-blue-200 rounded-full text-blue-500 cursor-default"
    document.getElementById('l').disabled=true
  }
  else if (page==finalpage+1)
  {
    	document.forms["form"].submit();
  }
  else {
    document.getElementById('l').className="h-10 w-10 border-2 border-blue-200 rounded-full text-blue-800 hover:bg-blue-200"
    document.getElementById('l').disabled=false
  }
  document.getElementById(page-1).className="hidden";
  document.getElementById(page).className="flex flex-col place-items-center w-full";
  if (page!=finalpage){
    document.getElementById(page+1).className="hidden";
  }
}
function grow(){
		page0();
	  document.getElementById('form').className="transiton duration-100 flex flex-col place-items-center font-mono w-11/12 md:w-1/2 bg-white text-blue-500 rounded-3xl"
}
</script>
