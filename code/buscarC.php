 <?php  
 $connect = mysqli_connect("localhost", "root", "", "historias");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM cliente WHERE Nombre1 LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li >'.$row["Nombre1"].'</li>'; 
                
           }  
      }  
      else  
      {  
           $output .= '<li>No encontrado</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  