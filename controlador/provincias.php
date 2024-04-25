<?php


function obtenerProvincias($conexion)
{
    $consultaSQL = "SELECT nombre_provincia FROM provincias ORDER BY nombre_provincia ASC";
    $resultado = $conexion->query($consultaSQL);
    if (!$resultado) {
        return false;
    }
    return $resultado;
}


?>