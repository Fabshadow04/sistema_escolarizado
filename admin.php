<?php

    session_start(); 
     //si la variable de sesion rol no tiene valor entonces nos manda a login.php
    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 1){      //si la variable de sesion tiene valor diferente a uno redirecciona a login.php
            header('location: login.php');
        }
    }


?>

<?php require_once "vistas/parte_superior.php" //enlaza la pagina parte_superior.php el cual nos trae html?>  
<div class="container">
    <h1>Contenido principal:</h1>
</div>

<?php include("db.php"); ?>



<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- Formulario para crear un usuario -->
      <div class="card card-body">
        <form action="registrar.php" method="POST">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Nombre del usuario" autofocus>
          </div>
 <div class="form-group">
            <input type="text" name="pass" class="form-control" placeholder="Contraseña" autofocus>
          </div>

          <div class="form-group">
            
        

          <select name="id_rol" class="form-control">

<option value="1">Administrador</option>

<option value="2">Servicios escolares</option>



<option value="4">Financiero</option>
<option value="5">Vigilante</option>



</select>
</div>

          
          <input type="submit" name="register"  class="btn btn-success btn-block" value="Guardar">
        </form>


      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>Id</th>  
            <th>Usuario</th>
            <th>Rol</th>
           
            
          </tr>
        </thead>
        <tbody>

          <?php
        
          $query = "SELECT * FROM usuarios "; //consulta que selecciona los datos de la tabla usuarios
          $result_tasks = mysqli_query($conn, $query);    

         while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
          <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
           
          
            <td><?php if ($row['id_rol']==1)echo "Administrador"; //dependiendo el valor es el mensaje que selecciona
                      if ($row['id_rol']==2)echo "Servicio E.";
                      if ($row['id_rol']==3)echo "Alumno";
                      if ($row['id_rol']==4)echo "Finanzas";
                      if ($row['id_rol']==5)echo "Vigilante";
            ?></td>
           
           
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

 

<?php require_once "vistas/parte_inferior.php"//enlaza el footer del sitio web?> 