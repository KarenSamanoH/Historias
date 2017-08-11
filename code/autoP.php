 <?php  
 $connect = mysqli_connect("localhost", "root", "", "historias");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM producto WHERE Modelo LIKE '%".$_POST["query"]."%' AND Categoria IN ('Invitacion')";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  $i=1;
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li id="m'.$i.'" onclick=rellenar(m'.$i.','.$row["IDCatElem"].')>'.$row["Modelo"].'</li>';  
           
                $i++;
           }  
      }  
      else  
      {  
           $output .= '<li>Producto no encontrado</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?> 
