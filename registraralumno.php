<?php 

include("db.php");
//registrando un alumno con sus datos
if (isset($_POST['register'])) {
    if (strlen($_POST['username']) >= 1 && strlen($_POST['pass']) >= 1) {
	    $name = trim($_POST['username']);
	    $pass = trim($_POST['pass']);
	    $rol = trim($_POST['id_rol']);
        $tel = trim($_POST['tel']);
        $edad = trim($_POST['edad']);
        $sexo = trim($_POST['sexo']); 
        $grupo = trim($_POST['grupo']);
        $grado = trim($_POST['grado']);
        $estatus = trim($_POST['estatus']);
        $nivel = trim($_POST['nivel']);

	    $consulta = "INSERT INTO usuarios(username,password,id_rol,tel,edad,sexo,grupo,grado,estatus,nivel) VALUES ('$name','$pass','$rol','$tel','$edad','$sexo','$grupo','$grado','$estatus','$nivel')";
	    $resultado = mysqli_query($conex,$consulta);
		if ($resultado){
  $_SESSION['message'] = 'Guardado con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: servicios_escolares.php');}
    }   else {
		header('Location: servicios_escolares.php');
	    	?> 
	    	
           <?php
    }
}

?>