<?php

session_start();

if (!isset($_SESSION['rol'])) {
  header('location: login.php');
} else {


  if ($_SESSION['rol'] == 1) {
  } else {
    if ($_SESSION['rol'] != 2) {
      header('location: login.php');
    }
  }
}


?>

<?php require_once "vistas/parte_superior.php" ?>
<div class="container">
  <h1>Servicios escolares:</h1>
</div>



<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->



      <!-- todo este codigo es un formulario para registrar un alumno -->
      <div class="card card-body" >
        <form action="registraralumno.php" method="POST">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Nombre del usuario" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="pass" class="form-control" placeholder="Contraseña" autofocus>
          </div>

          <div class="form-group">

            <input  name="id_rol" value="3" hidden class="form-control" placeholder="Alumno" autofocus>


          </div>


          
          <div class="form-group">
            <input type="number" name="tel" class="form-control" placeholder="Telefono" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="edad" class="form-control" placeholder="Edad" autofocus>
          </div>
          
          <div class="form-group">
            <input type="text" name="grupo" class="form-control" placeholder="Grupo" autofocus>
          </div>

          <div class="form-group">
            <input type="number" name="grado" class="form-control" placeholder="Grado" autofocus>
          </div>

          <div class="form-group">
           <label>Sexo:</label>
            <select name="sexo" class="form-control">
            
              <option value="H">Hombre</option>
              <option value="M">Mujer</option>
            </select>
          </div>

          <div class="form-group">
            <label>Estatus: </label>
            <select name="estatus" class="form-control">
              <option value="activo">Activo</option>
              <option value="inactivo">Inactivo</option>

            </select>
          </div>

          <div class="form-group">
            <label>Nivel educativo:</label>
            <select name="nivel" class="form-control">

              <option value="kinder">Kinder</option>
              <option value="primaria">Primaria</option>
              
              <option value="secundaria">Secundaria</option>
              <option value="preparatoria">Preparatoria</option>
            </select>
          </div>


          <input type="submit" name="register" class="btn btn-success btn-block" value="Guardar">
        </form>


      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>Matricula</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Grupo</th>
            <th>Grado</th>
            <th>Estatus</th>
            <th>Nivel educativo</th>
          </tr>
        </thead>
        <tbody>
        <?php include("db.php"); ?>
        <?php
          $query = "SELECT * FROM usuarios WHERE  id_rol=3"; //consulta que selecciona todos los alumnos que hay en el sistema
          $result_tasks = mysqli_query($conn, $query);    

         while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
          <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td> <a><font size="1"><?php echo $row['tel']; ?> </font></a></td>
            <td><?php echo $row['edad']; ?></td>
            <td><?php echo $row['sexo']; ?></td>
            <td><?php echo $row['grupo']; ?></td>
            <td><?php echo $row['grado']; ?></td>
            <td><?php echo $row['estatus']; ?></td>
            <td><?php echo $row['nivel']; ?></td>
           
          
            

           
            
          </tr>
          <?php } ?>





        </tbody>
      </table>
    </div>
  </div>
</main>




<?php require_once "vistas/parte_inferior.php" ?>