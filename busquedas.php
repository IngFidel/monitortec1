<?php

/* Buscador de Registros puede ser modificado para Ejemplos de UACI*/

$db_host="localhost";
$db_user="root";
$db_password="12345";
$db_name="uaci";
$db_table_name="alumnos";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);
mysql_close($db_connection);

/******** CONECTAR CON BASE DE DATOS **************** */
/******** Recuerda cambiar por tus datos ***********/ 
   $con = mysql_connect(“localhost”,”root”,”12345”);
   if (!$con){die(‘ERROR DE CONEXION CON MYSQL: ‘ . mysql_error());}
/* ********************************************** */

/********* CONECTA CON LA BASE DE DATOS  **************** */
   $database = mysql_select_db(“almacen”,$con);
   if (!$database){die(‘ERROR CONEXION CON BD: ‘.mysql_error());}
/* ********************************************** */

/*ejecutamos la consulta, que solicita nombre, Apellido Paterno y CURP de la
tabla Alumnos */
$sql = “SELECT Nombre, ApellidoPaterno,ApellidoMaterno, CURP FROM alumnos WHERE Nombre='”
      .$_POST[‘Nombre’].”‘”;
$result = mysql_query ($sql);
// verificamos que no haya error
if (! $result){
   echo “La consulta SQL contiene errores.”.mysql_error();
   exit();
}else {
    echo “<table border=’1’><tr><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>CURP</td>
         </tr><tr>”;


//obtenemos los datos resultado de la consulta
    while ($row = mysql_fetch_row($result)){
                echo “<td>”.$row[0].”</td><td>”.$row[1].”</td>
              <td>”.$row[2].”</td>”;
   }
   echo “</tr></table>”;
 }
?> 