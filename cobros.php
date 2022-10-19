<?php
//si tu rol es igual con administrador o financiero te deja estar en la pagina 
//en caso contrario te redirecciona a login.php
    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }
    
    else{


        if($_SESSION['rol'] == 1 ){}
        else{
        if($_SESSION['rol'] != 4 ){
            header('location: login.php');
        }}
    }


?>
<!--tabla en html para los cobros -->
<?php require_once "vistas/parte_superior.php"?>
<div class="container">
    <h1>Cobros:</h1>
</div>


<div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Folio</th>
            <th>Nombre</th>
            <th>Matricula</th>
            <th>Dia(pago)</th>
            <th>Mes(cobro)   </th>
            <th>Cantidad</th>           
            <th>Grado</th>
            <th>Grupo</th>
            <th>Estatus</th>
            <th>Nivel </th>
          </tr>
        </thead>
        <tbody>

       
 <?php
   include("db.php"); 
          
          $query = "SELECT * FROM cobros "; //consulta que selecciona los datos de la tabla de cobros
          $result_tasks = mysqli_query($conn, $query);    

         while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
          <td><?php echo $row['folio']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['id_alumno']; ?></td>
            <td><?php echo $row['dia_pago']; ?></td>
            <td><?php echo $row['mes_cobro']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            <td><?php echo $row['grado']; ?></td>
            <td><?php echo $row['grupo']; ?></td>
            <td><?php echo $row['estatus']; ?></td>
            <td><?php echo $row['nivel']; ?></td>
           
           
          </tr>
          <?php } ?>


        </tbody>
      </table>
    </div>

<?php require_once "vistas/parte_inferior.php"?>