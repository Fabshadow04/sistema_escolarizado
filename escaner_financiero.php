<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 4 && $_SESSION['rol'] != 1 && $_SESSION['rol'] != 5){
            header('location: login.php');
        }
    }

   // if(isset($_SESSION['id'])){echo $_SESSION['id'];}
?>










<!--formulario donde se realiza el pago -->
<?php require_once "vistas/parte_superior.php"?>
<div class="container">
    <h1>Realizar pago:</h1>
</div>


<div class="card card-body" style="width:500px; margin:0 auto;">
        <form action="escaner_alumno.php" method="POST">
            <div class="form-group">
                <label>Matricula del alumno que pagara:</label>
                <?php echo"
               <input  name='id' class='form-control' placeholder='Matricula' autofocus >";
         ?>
                </div>
           

            







            <input type="submit" name="register" class="btn btn-success btn-block" value="Escanear">
        </form>


    </div>
<?php require_once "vistas/parte_inferior.php"?>