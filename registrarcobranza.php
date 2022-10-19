<?php 
//registrando un plan de cobro en la tabla cobranza
include("db.php");

if (isset($_POST['register'])) {
    
	    $grado = trim($_POST['grado']);
	    $grupo = trim($_POST['grupo']);
	    $cantidad = trim($_POST['cantidad']);
        $mes = trim($_POST['mes']);
        $fechal = trim($_POST['fechal']);
        $nivel = trim($_POST['nivel']);
	    $consulta = "INSERT INTO cobranza(grado,grupo,cantidad,mes,fechal,nivel) VALUES ('$grado','$grupo','$cantidad','$mes','$fechal','$nivel')";
	    $resultado = mysqli_query($conex,$consulta);
		if ($resultado){
  $_SESSION['message'] = 'Guardado con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: cobranza.php');}
       
		
	    	
    
}

?>