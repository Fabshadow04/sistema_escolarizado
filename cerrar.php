<?php
//sirve para destruir una sesion
//aqui te redirecciona al momento de dar clic en cerrar sesion y te destruye la misma
session_start();
session_unset();
session_destroy();

header("Location: login.php");
?>