<?php
    require_once('../connections/cn.php');
    $sql = "SELECT libro.isbn, libro.titulo,  libro.anio_ed, libro.lugar_ed, libro.estanteria, libro.nejemplares,nivel.descripcion FROM libro, nivel where libro.id_nivel = nivel.idnivel and libro.id_nivel < 6 order by anio_ed desc";
    $res = pg_query($db, $sql);
    if(!$res) {
        echo pg_last_error($db);
        exit;
    }
    $row = pg_fetch_assoc($res)
?>