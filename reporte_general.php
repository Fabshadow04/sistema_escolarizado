<?php
//la pagina es una tabla donde consulta todos los alumnos que han pagado
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
<?php require_once "vistas/parte_superior.php"?>
<div class="container">
    <h3>Pagos kinder:</h3>
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
          
          $query = "SELECT * FROM cobros WHERE nivel='kinder' "; //consulta que selecciona los datos de la tabla usuarios
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






    <div class="container">
    <h3>Pagos primaria:</h3>
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
   //include("db.php"); 
          
          $query = "SELECT * FROM cobros WHERE nivel='primaria' "; //consulta que selecciona los datos de la tabla usuarios
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





    <div class="container">
    <h3>Pagos secundaria:</h3>
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
   //include("db.php"); 
          
          $query = "SELECT * FROM cobros WHERE nivel='secundaria' "; //consulta que selecciona los datos de la tabla usuarios
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


    <div class="container">
    <h3>Pagos preparatoria:</h3>
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
   //include("db.php"); 
          
          $query = "SELECT * FROM cobros WHERE nivel='preparatoria' "; //consulta que selecciona los datos de la tabla usuarios
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