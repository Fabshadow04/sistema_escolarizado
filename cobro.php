<?php 
//se insertan los datos del cobro en la base de datos
include("db.php");

if (isset($_POST['pagar'])) {
    if (strlen($_POST['id']) >= 1 && strlen($_POST['mes_cobro']) >= 1&& strlen($_POST['cantidad']) >= 1) {
	    $nombre = trim($_POST['nombre']);
	    $id = trim($_POST['id']);
	    $fecha = date("d/m/y");
        $mes = trim($_POST['mes_cobro']);
        $cantidad = trim($_POST['cantidad']);
        $grado = trim($_POST['grado']);
        $grupo = trim($_POST['grupo']);
        $estatus = trim($_POST['estatus']);
        $nivel = trim($_POST['nivel']);
	    $consulta = "INSERT INTO cobros(nombre,id_alumno,dia_pago,mes_cobro,cantidad,grado,grupo,estatus,nivel) VALUES ('$nombre','$id','$fecha','$mes','$cantidad','$grado','$grupo','$estatus','$nivel')";
	    $resultado = mysqli_query($conex,$consulta);
		if ($resultado){
  
  header('Location: escaner_financiero.php');}
    }   else {
		header('Location: escaner_financiero.php');
	    	?> 
	    	
           <?php
    }
}

?>