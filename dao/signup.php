<?php

	require_once('../connections/cn.php');
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$usuario = $_POST['usuario'];
	$password = bin2hex(openssl_random_pseudo_bytes(8));
	$nivel = $_POST['nivel'];

	$passworda = sha1($password);

	$query = "insert into usuario values($1,$2,$3,$4,$5)";
	$sql = pg_prepare($db, "insertarUser", $query);

	//echo "$nombre $apellido $usuario $password $nivel";
 
	$res = pg_execute($db, "insertarUser", array($usuario, $passworda, $nombre, $apellido, $nivel));

    if(!$res) {
        echo pg_last_error($db);
        exit;
    }

    echo "Usuario registrado con éxito. <a href='../login.php'>Clic aquí</a> para iniciar sesión.<br>" ;
    echo "Su contraseña es $password<br>";
    echo "Por favor, cambiala cuando inicies sesion por primera vez"

?>