<?php


function obtenerEmpleados($conexion)
{
    $consultaSQL = "SELECT * FROM empleados ORDER BY id_empleado ASC";
    $resultado = $conexion->query($consultaSQL);
    if (!$resultado) {
        return false;
    }
    return $resultado;
}

function obtenerDatosEmpleado($conexion, $id)
{
    $sql = ("SELECT * FROM empleados WHERE id_empleado = $id");
    $query = $conexion->query($sql);
    if (!$query) {
        return false;
        
    }
    $empleado = $query->fetch_assoc();
    return $empleado;
}
?>