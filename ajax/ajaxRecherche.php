<?php
    if(isset($_POST["test"])){
        $con = mysqli_connect("localhost","root","","test");
        mysqli_select_db($con,"ajaxdemo");
        $sql=  "SELECT idLexique, ortho FROM lexique WHERE ortho like '".$_POST["test"]."%' ORDER BY rang DESC ,ortho LIMIT 10";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
            echo "<a class='hover:text-black' href='/test2/exemples/lexique/".$row['idLexique']."'>".$row['ortho']."</a><br>";
        }
        if ($result->num_rows==0)
        {
          echo "Pas de Résultat";
        }
    }
?>
