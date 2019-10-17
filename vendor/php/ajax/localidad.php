<?php
require ('../querys.php');
require ('../conexion.php');

$provincia_id = (int) $_GET['provincia_id'];
$query = "SELECT id_localidad , localidad FROM `localidades` WHERE id_provincia=$provincia_id";
$result = mysqli_query($enlace, $query);
echo "<option disabled selected>Seleccione la localidad...</option>";
while ($row = mysqli_fetch_assoc($result)){
	echo "<option value='" . $row[id_localidad] . "'>" . utf8_encode($row[localidad]) ."</option>";
}
 
?>