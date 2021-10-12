<div class="flex flex-col justify-center text-center text-2xl h-screen">
  <div class="text-5xl">Titre de la page</div><div class="h-4 lg:h-8"></div>
<?php
$d=array();
foreach ($champs as $unCh) {
  $data=$unCh->COLUMN_NAME;
  switch ($unCh->DATA_TYPE) {
    case 'int':
      if ($unCh->COLUMN_KEY=="MUL"){
        foreach ($$data as $unEt) {
          if ($Exem->$data==$unEt->$data){
            echo $data." : ".$unEt->$data."-".$unEt->Libelle;
          }
        }
        break;
      }
      else if ($unCh->COLUMN_KEY=="PRI"){
        break;
      }
    case 'varchar':
    case 'date':
      echo $data." : ".$Exem->$data;
      break;
    case 'tinyint':
    if ($Exem->$data==1){
      echo "<nobr>".$data." : <i class='fas fa-check'></i></nobr>";
    }
    else {
      echo "<nobr>".$data." : <i class='fas fa-times'></i></nobr>";
    }
      break;
    default:
      echo "Beep Beep Boop Boop";
      break;
  }
  echo "<br>";
  }
//var_dump($_SESSION)
 ?>
</div>
