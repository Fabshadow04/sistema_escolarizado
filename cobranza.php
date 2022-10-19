    <?php
//si el rol es igual a 1 0 4 te deja permanecer en la pagina si no es asi te saca de la pagina 
//y te redirecciona a la pagina login.php
    session_start();

    if (!isset($_SESSION['rol'])) {
        header('location: login.php');
    } else {


        if ($_SESSION['rol'] == 1) {
        } else {
            if ($_SESSION['rol'] != 4) {
                header('location: login.php');
            }
        }
    }


    ?>
    <?php require_once "vistas/parte_superior.php" ?>
    <div class="container">
        <h1>Cobranza:</h1>
    </div>
    <div class="card card-body" style="width:500px; margin:0 auto;">
        <form action="registrarcobranza.php" method="POST">
            <div class="form-group">
                <input type="text" name="grado" class="form-control" placeholder="Grado" autofocus>
            </div>
            <div class="form-group">
                <input type="text" name="grupo" class="form-control" placeholder="Grupo" autofocus>
            </div>

            <div class="form-group">

                <input type="text" name="cantidad" class="form-control" placeholder="Cantidad" autofocus>


            </div>


            <div class="form-group">
                <label>Mes a pagar:</label>
                <select name="mes" class="form-control">

                    <option value="enero">Enero</option>
                    <option value="febrero">Febrero</option>
                    <option value="marzo">Marzo</option>
                    <option value="abril">Abril</option>
                    <option value="mayo">Mayo</option>
                    <option value="junio">Junio</option>
                    <option value="julio">Julio</option>
                    <option value="agosto">Agosto</option>
                    <option value="septiembre">Septiembre</option>
                    <option value="octubre">Octubre</option>
                    <option value="noviembre">Noviembre</option>
                    <option value="diciembre">Diciembre</option>
                </select>
            </div>

            <div class="form-group">
                <label>Fecha limite:</label>
                <input type="date" name="fechal" class="form-control" placeholder="Fecha limite" autofocus>
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




            <input type="submit" name="register" class="btn btn-success btn-block" value="Asignar plan de cobro">
        </form>


    </div>
    </div>

    <?php require_once "vistas/parte_inferior.php" ?>