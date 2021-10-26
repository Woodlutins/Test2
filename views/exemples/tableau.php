<?php
$d=array();
 ?>
 <div class="flex flex-col place-items-center justify-center w-11/12 lg:w-3/4 h-screen text-xs lg:text-xl">
<table class="border-collapse table-auto w-full">
  <thead class="border-2 bg-black bg-opacity-25">
    <tr>
      <?php
        foreach ($champs as $unChamps)
        {
          if ($unChamps->COLUMN_KEY!="PRI"){
            echo "<th>".$unChamps->COLUMN_NAME."</th>";
          }
        }
       ?>
       <th>Action</th>
    </tr>
  </thead>
  <tbody class="border">
    <?php
      foreach ($Exem as $unEx) {
        echo "<tr class='border bg-white bg-opacity-0 cursor-pointer hover:bg-opacity-25' onclick='window.location.href =`/".WEBROOT2."/exemples/index/".$unEx->IdExemple."`;'>";
        foreach ($champs as $unChamps) {
          $data=$unChamps->COLUMN_NAME;
          if ($unChamps->COLUMN_KEY!="PRI"){
            echo "<th class='border'>";
            switch ($unChamps->DATA_TYPE) {
              case 'int':
                if ($unChamps->COLUMN_KEY=="MUL"){
                  foreach ($$data as $unEt){
                    if ($unEx->$data==$unEt->$data){
                      echo $unEt->$data."-".$unEt->Libelle;
                    }
                  }
                  break;
                }
              case 'varchar':
              case 'date':
                echo $unEx->$data;
                break;
              case 'tinyint':
                if ($unEx->$data==1)
                {
                  echo '<i class="fas fa-check"></i>';
                }
                else {
                  echo '<i class="fas fa-times"></i>';
                }
                break;
              default:
                  echo "Beep Beep Boop Boop";
                break;
            }
            echo "</th>";
        }
        }
        echo '<th><a href="/'.WEBROOT2.'/exemples/tableauformModif/'.$unEx->IdExemple.'"><i class="fas fa-pen"></i></a> <a href="/'.WEBROOT2.'/exemples/tableauformSupp/'.$unEx->IdExemple.'" onclick="return confirm(`Voulez vous vraiment supprimer cette ligne?`);"><i class="fas fa-trash"></i></a></th></tr>';
      }
     ?>
<tr class='border bg-white bg-opacity-0 hover:bg-opacity-50 cursor-pointer' onclick="window.location.href ='/<?php echo WEBROOT2?>/exemples/tableauformAjout';" ><th colspan="50"><i class="fas fa-plus"></i></th></tr>
  </tbody>
</table>
</div>
