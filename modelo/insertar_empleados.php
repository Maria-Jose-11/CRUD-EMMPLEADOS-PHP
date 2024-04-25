<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("./conexion_base.php");
    $nombre_tabla = "empleados";

    
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

    if (isset($_FILES['foto'])) {
        $archivoTemporal = $_FILES['foto']['tmp_name'];
        $nombre_archivo = $_FILES['foto']['name'];

        $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

        // Generar un nombre único y seguro para el archivo
        $nombre_archivo = substr(md5(uniqid(rand())), 0, 10) . "." . $extension;
        $rutaDestino = $dirLocal . '/' . $nombre_archivo;

        // Mover el archivo a la ubicación deseada
        if (move_uploaded_file($archivoTemporal, $rutaDestino)) {

            $sql = "INSERT INTO $nombre_tabla (nombres, apellidos, cedula, provincia_domicilio, fecha_nacimiento, correo, observacion_personal, foto, fecha_ingreso, cargo, departamento, provincia_trabajo, sueldo, jornada_parcial, estado, observacion_laboral)
            VALUES ('$nombres', '$apellidos', '$cedula', '$provincia_domicilio', '$fecha_nacimiento', '$correo', '$observacion_personal', '$nombre_archivo', '$fecha_ingreso', '$cargo', '$departamento', '$provincia_trabajo', '$sueldo', '$jornada_parcial', '$estado', '$observacion_laboral')";

            if ($conexion->query($sql) === TRUE) {
                header("location:../");
            } else {
                echo "Error al crear el registro: " . $conexion->error;
            }
        } else {
            echo json_encode(array('error' => 'Error al mover el archivo'));
        }
    } else {
        echo json_encode(array('error' => 'No se ha enviado ningún archivo o ha ocurrido un error al cargar el archivo'));
    }
}
?>