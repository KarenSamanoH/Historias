 <?php  
 $connect = mysqli_connect("localhost", "root", "", "historias");  
 if(isset($_POST ["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM producto WHERE Modelo LIKE '%".$_POST["query"]."%' AND Categoria IN ('Papeleria')";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["Modelo"].'</li>';  
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
