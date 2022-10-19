<?php 
//registrando los datos de un nuevo usuario
include("db.php");

if (isset($_POST['register'])) {
    if (strlen($_POST['username']) >= 1 && strlen($_POST['pass']) >= 1) {
	    $name = trim($_POST['username']);
	    $pass = trim($_POST['pass']);
	    $rol = trim($_POST['id_rol']);
	    $consulta = "INSERT INTO usuarios(username,password,id_rol) VALUES ('$name','$pass','$rol')";
	    $resultado = mysqli_query($conex,$consulta);
		if ($resultado){
  $_SESSION['message'] = 'Guardado con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: admin.php');}
    }   else {
		header('Location: admin.php');
	    	?> 
	    	
           <?php
    }
}

?>