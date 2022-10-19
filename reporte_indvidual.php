<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: login.php');
        }
    }


?>

<?php require_once "vistas/parte_superior.php"?>
<div class="container">
    <h1>Reporte individual:</h1>
</div>
<?php require_once "vistas/parte_inferior.php"?>