<?php

	require_once('../connections/cn.php');
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$nivel = $_POST['nivel'];

	$password = sha1($password);

	$query = "insert into usuario values($1,$2,$3,$4,$5)";
	$sql = pg_prepare($db, "insertarUser", $query);

	//echo "$nombre $apellido $usuario $password $nivel";
 
	$res = pg_execute($db, "insertarUser", array($usuario, $password, $nombre, $apellido, $nivel));

    if(!$res) {
        echo pg_last_error($db);
        exit;
    }

    echo "Usuario registrado con éxito. <a href='../login.php'>Clic aquí</a> para iniciar sesión" ;

?>