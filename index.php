<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Document</title>

    <style>
        .div_titulo{
            display: flex;
            height: 50px;
            justify-content: center;
            align-items: center;
            align-content: center;
            background-color: #f5f5f5;
            
        }
        .div_tabla{
            width: 70%;
            display: flex;
            justify-content: center;
            border-radius: 5px;
            border-bottom: 10px;
        }
        .div_botones{
            display: flex;
            justify-content: center;
            color: black;
        }
    </style>
</head>
<body>
    <?php
        include("./modelo/conexion_base.php");
        include("./controlador/empleados.php");

        if (isset($_GET['id_empleado'])) {
            $id = $_GET['id_empleado'];
            $InformacionEmpleado = obtenerDatosEmpleado($conexion, $id);
            include("./vista/crear_empleados.php");
        }
        else{
            $empleados = obtenerEmpleados($conexion);
            
    ?>
            <div class="div_titulo">
                <p style="font: size 45px;">Módulo de Empleados</p>
            </div>
            <br>
            <br>
            <br>
            <center>
                <div class="div_tabla">
                <br>
                <br>
                    <?php
                        include("./vista/visualizar_empleados.php"); 
                    ?>
                </div>
            </center>

            <br>
            <br>
            <div class="div_botones" id="div_botones">
                <a href="./vista/crear_empleados.php"><button type="button" class="btn btn-success">Crear</button></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="./vista/visualizar_reporte.php"><button type="button" class="btn btn-warning">Reporte</button></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#"><button type="button" class="btn btn-danger">Salir</button></a> &nbsp;&nbsp;&nbsp;&nbsp;
                
            </div>
            
            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

            <!------------------css para la tabla de empleados-------------------------->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
            <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
            <?php
        }
        
    ?>
    <script>
        $(document).ready(function() {
            $("#TablaEmpleados").DataTable({
                language: {
                    url: "./public/json/DataTabla_es.json",
                },
            });
        });
    </script>
    
    

    
</body>
</html>