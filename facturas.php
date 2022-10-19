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
    <h1>Pagos realizados:</h1>
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
            <th>Factura </th>
          </tr>
        </thead>
        <tbody>

       
 <?php
 
   include("db.php"); 
   //session_start();
          $query = "SELECT * FROM cobros WHERE id_alumno= '$_SESSION[id]' "; //consulta que selecciona los datos de la tabla usuarios
          $result_tasks = mysqli_query($conn, $query);
          

         while($row = mysqli_fetch_assoc($result_tasks)) { ?>
       
          <tr>
          <td><?php echo $row['folio']; ?></td>
          <?php //$_SESSION['folio']=$row['folio'];  ?> 
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['id_alumno']; ?></td>
            <td><?php echo $row['dia_pago']; ?></td>
            <td><?php echo $row['mes_cobro']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            <td><?php echo $row['grado']; ?></td>
            <td><?php echo $row['grupo']; ?></td>
            <td><?php echo $row['estatus']; ?></td>
            <td><?php echo $row['nivel']; ?></td>
            <td>   <form action="facturapdf/facturapdf.php" method="POST">
            <?php echo"
               <input type='text'  value='$row[folio]' name='folio'  hidden>";
         ?>
                                <input type="submit" name="pdf"  class="btn btn-success btn-block" value="PDF">
                                </form>
                              </td>
           
           
          </tr>
          <?php } ?>


        </tbody>
      </table>
    </div>

<?php require_once "vistas/parte_inferior.php"?>