<?php

include("../code/conexion.php");
 

$term = mysqli_real_escape_string($conexion, $_REQUEST['term']);
$modelos=(isset($_REQUEST['modelos']))? $_REQUEST['modelos'] :  array();
 
if(isset($term)){
    
    $sql = "SELECT * FROM catalogoproducto WHERE Modelo LIKE '" . $term . "%'";
    if($result = mysqli_query($conexion, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                if (in_array($row['IDLinea'],$modelos)) {
                   echo "<p class='not-allow'>" . $row['Modelo'] . "</p>";
                
                } else{
                    echo "<p onclick='fillData(". $row['IDLinea'] .")'>" . $row['Modelo'] . "</p>";
                echo "<input id='model-". $row['IDLinea'] ."' type='hidden' value='".json_encode($row)."'>";
                }
                
            }
            
            mysqli_free_result($result);
        } else{
            echo "<p>No hay modelos</p>";
        }
    } else{
        echo "ERROR: " . mysqli_error($conexion);
    }
}
 

mysqli_close($conexion);
?>