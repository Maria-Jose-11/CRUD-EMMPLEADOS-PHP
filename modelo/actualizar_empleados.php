<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("./conexion_base.php");
    $nombre_tabla = "empleados";

    $id_empleado = trim($_POST['id_empleado']);
    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $cedula = trim($_POST['cedula']);
    $provincia_domicilio = trim($_POST['provincia_domicilio']);
    $fecha_nacimiento = trim($_POST['fecha_nacimiento']);
    $correo = trim($_POST['correo']);
    $observacion_personal = trim($_POST['observacion_personal']);
    $fecha_ingreso = trim($_POST['fecha_ingreso']);
    $cargo = trim($_POST['cargo']);
    $departamento = trim($_POST['departamento']);
    $provincia_trabajo = trim($_POST['provincia_trabajo']);
    $sueldo = trim($_POST['sueldo']);
    $jornada_parcial = trim($_POST['jornada_parcial']);
    $estado = "Vigente";
    $observacion_laboral = trim($_POST['observacion_laboral']);

    $dirLocal = "../public/imagenes_empleados";
    $foto = null;

    if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) {
        $archivoTemporal = $_FILES['foto']['tmp_name'];
        $nombre_archivo = $_FILES['foto']['name'];

        $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

        // Generar un nombre único y seguro para el archivo
        $nombre_archivo = substr(md5(uniqid(rand())), 0, 10) . "." . $extension;
        $rutaDestino = $dirLocal . '/' . $nombre_archivo;

        // Mover el archivo a la ubicación deseada
        if (move_uploaded_file($archivoTemporal, $rutaDestino)) {
            $foto = $nombre_archivo;
        }
         
        
    }
    $sql = "UPDATE $nombre_tabla SET nombres='$nombres', apellidos='$apellidos', cedula='$cedula', 
            provincia_domicilio='$provincia_domicilio', fecha_nacimiento='$fecha_nacimiento', correo='$correo', 
            observacion_personal='$observacion_personal', fecha_ingreso='$fecha_ingreso', 
            cargo='$cargo', departamento='$departamento', provincia_trabajo='$provincia_trabajo', sueldo='$sueldo', 
            jornada_parcial='$jornada_parcial', estado='$estado', observacion_laboral='$observacion_laboral'";
    
    if ($foto !== null) {
        $sql .= ", foto='$foto'";
    }

    $sql .= " WHERE id_empleado='$id_empleado'";

    echo $sql;
    if ($conexion->query($sql) === TRUE) {
        header("location:../");
    } else {
        echo "Error al actualizar el registro: " . $conexion->error;
    }
}
?>