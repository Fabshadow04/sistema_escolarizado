<?php
//si es diferente al rol de alumno te redirije a login.php
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

<!--Formulario para escanear la matricula del alumno que ha iniciado sesion  -->
<div class="card card-body" style="width:500px; margin:0 auto;">
        <form action="escaner_alumno.php" method="POST">
            <div class="form-group">
                <label>Tu numero de matricula es:</label> 
                <?php //se toma la variable de sesion para capturar el id del alumno
                echo"
               <input type='text'  value='$_SESSION[id]' name='id' class='form-control' placeholder='Matricula' autofocus readonly>";
         ?>
                </div>
           

            







            <input type="submit" name="register" class="btn btn-success btn-block" value="Escanear">
        </form>


    </div>
<?php require_once "vistas/parte_inferior.php"?>