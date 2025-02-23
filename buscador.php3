<html> 
<body> 
  
<?php 
if (!isset($buscar)){ 
      echo "Debe especificar una cadena a buscar"; 
      echo "</html></body> \n"; 
      exit; 
} 
$link = mysql_connect("localhost", "root","12345"); 
mysql_select_db("uaci", $link); 

$result = mysql_query("SELECT * FROM alumnos WHERE Nombre LIKE '%$buscar%' ORDER BY Nombre", $link); 
if ($row = mysql_fetch_array($result)){ 
      echo "<table border = '1'> \n"; 
//Mostramos los nombres de las tablas 
echo "<tr> \n"; 
while ($field = mysql_fetch_field($result)){ 
            echo "<td>$field->name</td> \n"; 
} 
      echo "</tr> \n"; 
do { 
            echo "<tr> \n"; 
            echo "<td>".$row["id"]."</td> \n"; 
            echo "<td>".$row["Nombre"]."</td> \n"; 
            echo "<td>".$row["Direccion"]."</td> \n"; 
            echo "<td>".$row["Licenciatura"]."</td> \n"; 
            echo "<td><a href='mailto:".$row["email"]."'>".$row["email"]."</a></td> \n"; 
            echo "</tr> \n"; 
      } while ($row = mysql_fetch_array($result)); 
            echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
  
</body> 
</html> 