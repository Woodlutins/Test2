<?php
$d=array();
 ?>
 <div class="h-16 lg:h-32"></div>
 <div class="flex flex-col place-items-center justify-center w-11/12 lg:w-3/4">
<table class="border-collapse table-auto">
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
        echo "<tr class='border bg-white bg-opacity-0 hover:bg-opacity-25'>";
        foreach ($champs as $unChamps) {
          $data=$unChamps->COLUMN_NAME;
          if ($unChamps->COLUMN_KEY!="PRI"){
          echo "<th class='border'>";
          switch ($unChamps->DATA_TYPE) {
            case 'int':
            case 'varchar':
            case 'date':
              echo $unEx->$data;
              break;
            case 'tinyint':
              if ($unEx->$data==1)
              {
                echo '<i class="fas fa-check"></i>';
              }
              break;
            default:
                echo "Beep Beep Boop Boop";
              break;
          }
          echo "</th>";
        }
        }
        echo '<th><a href="/'.WEBROOT2.'/exemples/tableauformModif/'.$unEx->IdExemple.'"><i class="fas fa-pen"></i></a> <i class="fas fa-trash"></i></th></tr>';
      }
     ?>
<tr class='border bg-white bg-opacity-0 hover:bg-opacity-50' onclick="window.location.href ='/<?php echo WEBROOT2?>/exemples/tableauformAjout';" ><th colspan="50"><i class="fas fa-plus"></i></th></tr>
  </tbody>
</table>
</div>
