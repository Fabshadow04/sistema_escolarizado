<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{ //condicional para validar que el usuario que entra sea: administrador,financiero,alumno o vigilante
        if($_SESSION['rol'] != 3  && $_SESSION['rol'] != 4 && $_SESSION['rol'] != 1 && $_SESSION['rol'] != 5){
            header('location: login.php');
        } 


        
    }


?>
<?php require_once "vistas/parte_superior.php" ?>
<?php 

include("db.php"); //incluyendo el archivo de la base de datos
 $deuda=0; //inicializando contador de deuda

if (isset($_POST['register']))
{
    $id = trim($_POST['id']); //capturando el id enviado
    $consulta = "SELECT*  FROM usuarios WHERE id ='$id' "; //consultando en la bd si hay un id con ese valor
    $resultado = mysqli_query($conex,$consulta);
   


    if (mysqli_num_rows($resultado) == 0) { //en caso de no existir ese dato
      echo " <script type='text/javascript'>
      alert('No hay ningun alumno con esa matricula');
   window.location.href = 'escaner_financiero.php';
</script>";
        }
     else { 
      // en caso de existir un id con ese valor

      

       while($row = mysqli_fetch_assoc($resultado)) //recorrriendo los datos de esa consulta 
      {  
        /*
        echo $row['grado'];
        echo $row['grupo'];
        echo $row['nivel'];
        echo "<br>"; */


        //validando que el grado,grupo y nivel del usuario que se ha enviado el id exista dentro de cobranzas
        $cobranza="SELECT* FROM cobranza WHERE grado='$row[grado]' AND grupo='$row[grupo]' AND nivel='$row[nivel]'";
        $query= mysqli_query($conex,$cobranza);

        if(mysqli_num_rows($query)==0)
        { //en caso de no haber nada en ese query
          echo "no hay grado y grupo";
          echo "<br>";
        }
        else{ 
        //  en caso de que la consulta no este vacia
         
          while($rowcobranza = mysqli_fetch_assoc($query)) 
          {
              //validando si el alumno pago o no
               $cobro ="SELECT* FROM cobros WHERE id_alumno= '$id' AND  mes_cobro='$rowcobranza[mes]' ";
               $queryc= mysqli_query($conex,$cobro);
               if(mysqli_num_rows($queryc)==0)
               { //en caso de no exisitir datos (osea no hay pago) despliega un formulario con sus datos
                if($_SESSION['rol'] == 4 ){ //en caso que tu rol sea financiero 
                  echo "<div class='card card-body' style='width:500px; margin:0 auto;'>
                  <form action='cobro.php' method='POST'>
                  <label>Matricula:</label>
                      <div class='form-group'>
                          <input type='text' name='id' class='form-control' value='$id' autofocus readonly >
                      </div>
                      <label>Mes a cobrar:</label>
                      <div class='form-group'>
                      <input type='text' name='mes_cobro' class='form-control' value='$rowcobranza[mes]' autofocus readonly>
                  </div>
                  <label>Cantidad:</label>
                  <div class='form-group'>
                  <input type='text' name='cantidad' class='form-control' value='$rowcobranza[cantidad]' autofocus readonly>
              </div>
              <label>Nombre del alumno:</label>
              <div class='form-group'>
                  <input type='text' name='nombre' class='form-control' value='$row[username]' autofocus readonly>
              </div>

              <div class='form-group'>
                  <input type='text' name='grado' class='form-control' value='$row[grado]' autofocus readonly hidden>
              </div>
             
              <div class='form-group'>
              <input type='text' name='grupo' class='form-control' value='$row[grupo]' autofocus readonly hidden>
          </div>

          <div class='form-group'>
                  <input type='text' name='estatus' class='form-control' value='$row[estatus]' autofocus readonly hidden>
              </div>
              

              <div class='form-group'>
                  <input type='text' name='nivel' class='form-control' value='$row[nivel]' autofocus readonly hidden>
              </div>
                     
          
                      
          
          
          
          
          
          
             
                      <input type='submit' name='pagar' class='btn btn-success btn-block' value='Pagar'>
                  </form>
          
          
              </div>"; }


              if($_SESSION['rol'] == 1 ){ //en caso que tu rol sea administrador
                echo "<div class='card card-body' style='width:500px; margin:0 auto;'>
                <form action='cobro.php' method='POST'>
                <label>Matricula:</label>
                    <div class='form-group'>
                        <input type='text' name='id' class='form-control' value='$id' autofocus readonly >
                    </div>
                    <label>Mes a cobrar:</label>
                    <div class='form-group'>
                    <input type='text' name='mes_cobro' class='form-control' value='$rowcobranza[mes]' autofocus readonly>
                </div>
                <label>Cantidad:</label>
                <div class='form-group'>
                <input type='text' name='cantidad' class='form-control' value='$rowcobranza[cantidad]' autofocus readonly>
            </div>
            <label>Nombre del alumno:</label>
            <div class='form-group'>
                <input type='text' name='nombre' class='form-control' value='$row[username]' autofocus readonly>
            </div>

            <div class='form-group'>
                <input type='text' name='grado' class='form-control' value='$row[grado]' autofocus readonly hidden>
            </div>
           
            <div class='form-group'>
            <input type='text' name='grupo' class='form-control' value='$row[grupo]' autofocus readonly hidden>
        </div>

        <div class='form-group'>
                <input type='text' name='estatus' class='form-control' value='$row[estatus]' autofocus readonly hidden>
            </div>
            

            <div class='form-group'>
                <input type='text' name='nivel' class='form-control' value='$row[nivel]' autofocus readonly hidden>
            </div>
                   
        
                    
        
        
        
        
        
        
           
                    <input type='submit' name='pagar' class='btn btn-success btn-block' value='Pagar'>
                </form>
        
        
            </div>"; }




              if($_SESSION['rol'] == 3 ){ //en caso que tu rol sea alumno
                echo "<div class='card card-body' style='width:500px; margin:0 auto;'>
                <form action='cobro.php' method='POST'>
                    <div class='form-group'>
                        <input type='text' name='id' class='form-control' value='$id' autofocus readonly hidden >
                    </div>
                    <label>Mes a cobrar:</label>
                    <div class='form-group'>
                    <input type='text' name='mes_cobro' class='form-control' value='$rowcobranza[mes]' autofocus readonly>
                </div>
                <label>Cantidad:</label>
                <div class='form-group'>
                <input type='text' name='cantidad' class='form-control' value='$rowcobranza[cantidad]' autofocus readonly>
            </div>
            <label>Tu nombre:</label>
            <div class='form-group'>
                <input type='text' name='nombre' class='form-control' value='$row[username]' autofocus readonly>
            </div>

            <div class='form-group'>
                <input type='text' name='grado' class='form-control' value='$row[grado]' autofocus readonly hidden>
            </div>
           
            <div class='form-group'>
            <input type='text' name='grupo' class='form-control' value='$row[grupo]' autofocus readonly hidden>
        </div>

        <div class='form-group'>
                <input type='text' name='estatus' class='form-control' value='$row[estatus]' autofocus readonly hidden>
            </div>
            

            <div class='form-group'>
                <input type='text' name='nivel' class='form-control' value='$row[nivel]' autofocus readonly hidden>
            </div>
                   
        
                    
        
        
        
        
        
        
           
                   
                </form>
        
        
            </div>"; }


            
              
              $deuda++; //contador de la deuda del alumno
              
            } 
               else 
              {
               // si el pago se ha realizado
                
              }
            }
        
        }
      }
       }
//echo $deuda;

//condicionales de las banderas dependiendo que valor tenga es la imagen que se selecciona
if ($deuda==0) {

    echo"<center><a href='escaner_financiero'>Escanear otra matricula</a></center>";
    $c = "SELECT*  FROM usuarios WHERE id ='$id' ";
    $r = mysqli_query($conex,$consulta);
    while($row = mysqli_fetch_assoc($r)) 
    {
        echo "<div class='card card-body' style='width:500px; margin:0 auto;'>
        <form action='' method='POST'>
        <label>Datos del alumno:</label>
            <div class='form-group'>
                <input type='text' name='id' class='form-control' value='Id: $id' autofocus readonly  >
            </div>
            
       
    
    <div class='form-group'>
        <input type='text' name='nombre' class='form-control' value='Nombre: $row[username]' autofocus readonly>
    </div>

    


<div class='form-group'>
        <input type='text' name='nivel' class='form-control' value='Nivel: $row[nivel]' autofocus readonly >
    </div>


    

    
           

            






   
           
        </form>


    </div>";

    }

    echo "
    <center><h1>No hay deuda</h1> </center>
    <center><img src='img/banderaverde' alt='banderaverde' /> </center>";
    
}
if ($deuda==1) {
    if($_SESSION['rol'] == 5 ){ //en caso de haber iniciado sesion como vigilante
        echo"<center><a href='escaner_financiero'>Escanear otra matricula</a></center>";
    $c = "SELECT*  FROM usuarios WHERE id ='$id' ";
    $r = mysqli_query($conex,$consulta);
    while($row = mysqli_fetch_assoc($r)) 
    {
        echo "<div class='card card-body' style='width:500px; margin:0 auto;'>
        <form action='' method='POST'>
        <label>Datos del alumno:</label>
            
            
       
    
    <div class='form-group'>
        <input type='text' name='nombre' class='form-control' value='Nombre: $row[username]' autofocus readonly>
    </div>

    


<div class='form-group'>
        <input type='text' name='nivel' class='form-control' value='Nivel: $row[nivel]' autofocus readonly >
    </div>


    

    
           

            






   
           
        </form>


    </div>";

    }

}
    echo "
    <center><h1>Adeudas un mes</h1> </center>
    <center><img src='img/banderamarilla' alt='banderamarilla' /> </center>";}
if ($deuda>=2) {
    if($_SESSION['rol'] == 5 ){
        echo"<center><a href='escaner_financiero'>Escanear otra matricula</a></center>";
    $c = "SELECT*  FROM usuarios WHERE id ='$id' ";
    $r = mysqli_query($conex,$consulta);
    while($row = mysqli_fetch_assoc($r)) 
    {
        echo "<div class='card card-body' style='width:500px; margin:0 auto;'>
        <form action='' method='POST'>
        <label>Datos del alumno:</label>
            
            
       
    
    <div class='form-group'>
        <input type='text' name='nombre' class='form-control' value='Nombre: $row[username]' autofocus readonly>
    </div>

    


<div class='form-group'>
        <input type='text' name='nivel' class='form-control' value='Nivel: $row[nivel]' autofocus readonly >
    </div>


    

    
           

            






   
           
        </form>


    </div>";

    }

}
    
    echo "
    <center><h1>Debes dos meses o mas </h1> </center>
    <center><img src='img/banderaroja' alt='banderaroja' /> </center>";}


}




?>
<?php require_once "vistas/parte_inferior.php" ?>