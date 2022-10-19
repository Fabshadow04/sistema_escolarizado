<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 3){
            header('location: login.php');
        }
    }


?>

<?php require_once "vistas/parte_superior.php"?>
<div class="container">
    <h1>Alumno:</h1>
</div>


<div class="card card-body" style="width:500px; margin:0 auto;">
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" name="id" class="form-control" placeholder="Matricula" autofocus>
            </div>
           

            







            <input type="submit" name="register" class="btn btn-success btn-block" value="Escanear">
        </form>


    </div>
<?php require_once "vistas/parte_inferior.php"?>