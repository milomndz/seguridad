<?php
    require_once('../connections/cn.php');
    $sql = "SELECT isbn, titulo, anio_ed, lugar_ed, estanteria, nejemplares FROM libro WHERE id_nivel <= 5 and anio_ed BETWEEN 1996 AND 2018 order by anio_ed desc";
    $res = pg_query($db, $sql);
    if(!$res) {
        echo pg_last_error($db);
        exit;
    }
    $row = pg_fetch_assoc($res)
?>