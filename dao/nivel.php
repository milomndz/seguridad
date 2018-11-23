<?php
    function colorNivel($nivel){
        $line = "";
        if ($nivel == "Publico") {
            $line = "<strong class='d-inline-block mb-2 text-info'>Publico</strong>";   
            return $line;
        }
        elseif ($nivel == "Registrado") {
            $line = "<strong class='d-inline-block mb-2 text-primary'>Registrado</strong>";   
            return $line;
        }
        elseif ($nivel == "Maestro") {
            $line = "<strong class='d-inline-block mb-2 text-success'>Maestro</strong>";   
            return $line;
        }
        elseif ($nivel == "Investigador") {
            $line = "<strong class='d-inline-block mb-2 text-secondary'>Investigador</strong>";   
            return $line;
        }
        elseif ($nivel == "Estatal") {
            $line = "<strong class='d-inline-block mb-2 text-warning'>Estatal</strong>";   
            return $line;
        }
        elseif ($nivel == "Intocable") {
            $line = "<strong class='d-inline-block mb-2 text-danger'>Estatal</strong>";   
            return $line;
        }
    }
?>