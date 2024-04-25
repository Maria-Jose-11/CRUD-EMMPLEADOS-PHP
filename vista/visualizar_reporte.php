<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
    <title>Provedatos</title>
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
            width: 100%;
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
        .encabezado{
            background-color: skyblue;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Estilos adicionales para la impresión */
        @media print {
            /* Mantener bordes y relleno de celdas */
            th, td {
                border: 1px solid #000;
                padding: 8px;
            }

            /* Ocultar otros elementos durante la impresión si es necesario */
            body > *:not(table) {
                display: none;
            }
        }
    </style>
</head>
<body>
    <?php
        include("../modelo/conexion_base.php");
        include("../controlador/empleados.php");

        $empleados = obtenerEmpleados($conexion);
            
    ?>
    <div id="reporte_impresion"></div>
        <center>
            <h1>Reporte de empleados</h1>
            
            <div class="container">
                <h4>Provedatos del Ecuador </h4>
                <br>
                <div style="text-align: right;">Informe generado el: <span id="fecha_actual"></span></div>
                    
                    
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="div_tabla">
                <div class="table-responsive">
                    <table class="table table-hover" id="TablaEmpleados">
                        <thead>
                            <tr class="encabezado">
                                <th scope="col">Nombre</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Dirección domiciliaria</th>
                                <th scope="col">Correo electrónico</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Provincia</th>
                                <th scope="col">Fecha de ingreso</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($empleados as $empleado) { ?>
                                <tr id="empleado_<?php echo $empleado['id_empleado']; ?>">
                                    <td><?php echo $empleado['nombres']; ?> <?php echo $empleado['apellidos']; ?></td>
                                    <td><?php echo $empleado['cedula']; ?></td>
                                    <td><?php echo $empleado['provincia_domicilio']; ?></td>
                                    <td><?php echo $empleado['correo']; ?></td>
                                    <td><?php echo $empleado['departamento']; ?></td>
                                    <td><?php echo $empleado['cargo']; ?></td>
                                    <td><?php echo $empleado['provincia_trabajo']; ?></td>
                                    <td><?php echo $empleado['fecha_ingreso']; ?></td>
                                    <td><?php echo $empleado['estado']; ?></td>
                                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <br>
            <br>
            <div class="div_botones" id="div_botones">
                <a href="../index.php"><button type="button" class="btn btn-danger">Regresar</button></a> &nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <button type="button" onclick="window.print()" class="btn btn-primary">Imprimir</button> &nbsp;&nbsp;&nbsp;&nbsp; -->
                
            </div>
        </center>
    </div>
    <a href="../public/json/DataTabla_es.json"></a>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!------------------css para la tabla de empleados-------------------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $("#TablaEmpleados").DataTable({
                language: {
                    url: "../public/json/Reporte_es.json",
                },
            });
        });

        //MOSTRAR LA FECHA ACTUAL PPARA IMPRESIÓN DE INFORME
        var fechaActual = new Date();
        var dia = fechaActual.getDate();
        var mes = fechaActual.getMonth() + 1; 
        var anio = fechaActual.getFullYear();
        var hora = fechaActual.getHours();
        var minuto = fechaActual.getMinutes();
        var segundo = fechaActual.getSeconds();

        var FechaImpresion = dia + '/' + mes + '/' + anio + ' ' + hora + ':' + minuto + ':' + segundo;
        document.getElementById('fecha_actual').textContent = FechaImpresion;


        function imprimirTabla() {
            var reporte_impresion = document.getElementById("reporte_impresion").innerHTML;
            var ventanaImpresion = window.open('', '_self');
            ventanaImpresion.document.write('<html><head><title>Provedatos - Reporte de empleados</title></head><body>');
            ventanaImpresion.document.write(reporte_impresion);
            ventanaImpresion.document.write('</body></html>');
            ventanaImpresion.print();
            ventanaImpresion.close();
        }
    </script>
    
</body>
</html>