 <?php  
 $connect = mysqli_connect("localhost", "root", "", "historias");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM catalogoelemento WHERE Nombre LIKE '%".$_POST["query"]."%' AND Categoria IN ('Boleto')";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-styled">';  
      if(mysqli_num_rows($result) > 0)  
      {  $i=1;
           while($row = mysqli_fetch_array($result))  
           {  $id_elem=$row["IDCatElem"];
                $output .= '<li id="b'.$i.'" onclick=rellenar2(b'.$i.','.$id_elem.')>'.$row["Nombre"].'</li>';  
           $i++;
                
           }  
      }  
      else  
      {  
           $output .= '<li>Modelo no encontrado</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?> 


