<?php
    include_once 'database.php';
    include_once 'db.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: admin.php');
            break;

            case 2:
            header('location: servicios_escolares.php');
            break;

            default:
        }
    }
       //verficar si username y password tienen datos, si los tiene realizar una consulta para verificar que los datos 
       //introducidos son correctos
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE username = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
       // $row2 = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[3];
          //  $id=$row2[0];

           $consultaid= "SELECT id FROM usuarios WHERE username ='$username' AND password ='$password'";
           $resultado= mysqli_query($conex,$consultaid);
           if ($resultado)
           {
            while($row = mysqli_fetch_assoc($resultado)) 
            {
                $_SESSION['id']=$row['id'];
            }
           }




           // te redirige a la pagina segun sea el caso 1 como admin 2 como servicios escolares
            $_SESSION['rol'] = $rol;
            
           
            switch($rol){
                case 1:
                    header('Location: admin.php');
                break;

                case 2:
                header('Location: servicios_escolares.php');
                break;

                case 3:
                    header('Location: alumno.php');
                break;

                case 4:
                    header('Location: cobranza.php');
                break;


                case 5:
                    header('Location: escaner_financiero.php');
                break;

                default:
            }
        }else{
            // no existe el usuario
          //  echo "Nombre de usuario o contraseña incorrecto";
        }
        

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inicia sesion</title>

    <!--formulario del login-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                    </div>
                                    <form action="#" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Usuario" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Contraseña" name="password">
                                        </div>
                                       <!--  <div class="form-group">
                                           <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>  -->
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Entrar">
                                            
                                       
                                        <hr>
                                        
                                    </form>
                                     <!-- 
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>