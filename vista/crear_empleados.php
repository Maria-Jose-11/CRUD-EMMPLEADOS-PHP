<?php
if (isset($InformacionEmpleado['id_empleado'])) { ?>
    <a href="./"><i class="bi bi-arrow-right-circle"></i></a>
<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" required />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
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
        .div_subtitulo{
            display: flex;
            height: 50px;
            justify-content: center;
            align-items: center;
            align-content: center;
            background-color: #c9e9fc;
        }
        .div_tabs{
            width: 60%;
        }
        .div_formulario{
            /* width: 60%; */
            display: flex;
            justify-content: center;
            border-radius: 5px;
            border-color: #f5f5f5;
           
        }

        .tabContainer {
            margin-top: 20px;
        }

        

        .div_botones{
            display: flex;
            justify-content: center;
            color: black;
        }
        
        .error-message {
            color: red;
        }
    </style>
    </style>
</head>
<body>
<form action="<?php echo isset($InformacionEmpleado['id_empleado']) ? './modelo/actualizar_empleados.php' : '../modelo/insertar_empleados.php'; ?>" method="POST" enctype="multipart/form-data" onsubmit="return validarCampos()">
    <?php if (isset($InformacionEmpleado['id_empleado'])) { ?>
        <input type="hidden" name="id_empleado" value="<?php echo $InformacionEmpleado['id_empleado']; ?>" required />
    <?php } ?>   
    
    <div class="div_titulo">
        <p style="font: size 45px;">Módulo de Empleados</p>
    </div>
    <div class="div_subtitulo">
        <p style="font: size 55px;color:blue">CREAR EMPLEADO NUEVO</p>
    </div>
    <br>
    
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="disabled-tab-0" data-bs-toggle="tab" href="#disabled-tabpanel-0" role="tab" aria-controls="disabled-tabpanel-0" aria-selected="true" style="font-size: 20px">Datos Personales</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="disabled-tab-1" data-bs-toggle="tab" href="#disabled-tabpanel-1" role="tab" aria-controls="disabled-tabpanel-1" aria-selected="false" style="font-size: 20px">Datos Laborales</a>
        </li>
        
    </ul>
    
    <div class="tab-content pt-5" id="tab-content">
        <div class="tab-pane active" id="disabled-tabpanel-0" role="tabpanel" aria-labelledby="disabled-tab-0">
            <div class="div_formulario">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label class="form-label" style="align-items: left;"><b>Nombres</b></label>
                                <input type="text" name="nombres" class="form-control" value="<?php echo isset($InformacionEmpleado['nombres']) ? $InformacionEmpleado['nombres'] : ''; ?>"  />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="cedula"><b>Cedula</b></label>
                                <input type="text" name="cedula" id="cedula" class="form-control" value="<?php echo isset($InformacionEmpleado['cedula']) ? $InformacionEmpleado['cedula'] : ''; ?>" required />
                                <div id="error-cedula" class="error-message"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><b>Fecha de nacimiento</b></label>
                                <input type="date" name="fecha_nacimiento" class="form-control" value="<?php echo isset($InformacionEmpleado['fecha_nacimiento']) ? $InformacionEmpleado['fecha_nacimiento'] : ''; ?>" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><b>Observacion Personal</b></label>
                                <textarea type="text" name="observacion_personal" class="form-control" style="height:120px; " placeholder="Comentario u observacion referente a la ficha personal" ><?php echo isset($InformacionEmpleado['observacion_personal']) ? $InformacionEmpleado['observacion_personal'] : ''; ?></textarea>
                            </div>
                            
                        </div>

                        <div class="col-sm">
                            <div class="mb-3">
                                <label class="form-label"><b>Apellidos</b></label>
                                <input type="text" name="apellidos" class="form-control" value="<?php echo isset($InformacionEmpleado['apellidos']) ? $InformacionEmpleado['apellidos'] : ''; ?>" required />
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label"><b>Provincia</b></label>
                                <br>
                                <select name="provincia_domicilio" class="form-select" required>
                                    <option selected value="">Escoja una provincia</option>
                                    <?php
                                    $provincias = array(
                                        "Pichincha",
                                        "Guayas",
                                        "Santa Elena",
                                        "Cotopaxi",
                                        "Imbabura"
                                    );
                                    foreach ($provincias as $provincia) {
                                        $selected = ($provincia == $InformacionEmpleado['provincia_domicilio']) ? 'selected' : '';
                                        echo "<option value='$provincia' $selected>$provincia</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Email</b></label>
                                <input type="email" id="email" name="correo" class="form-control" value="<?php echo isset($InformacionEmpleado['correo']) ? $InformacionEmpleado['correo'] : ''; ?>" required />
                                <div id="error-email" class="error-message"></div>
                            </div>


                            
                            <div class="mb-3 mt-4">
                                <label class="form-label">Fotografía:  </label>
                                <br>
                                <?php
                                if (isset($InformacionEmpleado['id_empleado'])) { ?>
                                    <img style="display: block;" class="rounded-circle float-start" src="./public/imagenes_empleados/<?php echo $InformacionEmpleado['foto']; ?>" alt="Foto del empleado" width="90">
                                <?php }
                                else{
                                ?>
                                    <img style="display: block;" class="rounded-circle float-start" src="../public/imagenes_empleados/perfil_default.jpg" alt="Foto del empleado" width="90">
                                <?php }
                                ?>
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-primary"><input class="form-control form-control-sm" type="file" name="foto" accept="image/png, image/jpeg" <?php echo !isset($InformacionEmpleado['id_empleado']) ? 'required' : ''; ?> /></button>
                            </div>
                            <br><br>

                        </div>
                    </div>
                </div> 
            </div>
            <br>
            <div class="div_botones" id="div_botones">
                <!-- <button type="button" onclick="redireccionarDatosLaborales()" class="btn btn-success">Continuar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                <a href="./visualizar_reporte.php"><button type="button" class="btn btn-warning">Reporte</button></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="../index.php"><button type="button" class="btn btn-danger">Salir</button></a> &nbsp;&nbsp;&nbsp;&nbsp;
                
            </div>
        </div>
        

        <div class="tab-pane" id="disabled-tabpanel-1" role="tabpanel" aria-labelledby="disabled-tab-1">
            <div class="div_formulario">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                        
                            <div class="mb-3">
                                <label class="form-label" style="align-items: left;"><b>Fecha de ingreso</b></label>
                                <input type="date" name="fecha_ingreso" class="form-control" value="<?php echo isset($InformacionEmpleado['fecha_ingreso']) ? $InformacionEmpleado['fecha_ingreso'] : ''; ?>" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><b>Departamento</b></label>
                                <input type="text" name="departamento" class="form-control" value="<?php echo isset($InformacionEmpleado['departamento']) ? $InformacionEmpleado['departamento'] : ''; ?>" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><b>Sueldo</b></label>
                                <div class="col-md-4">
                                    <div class="input-group pull-left">
                                        <input type="number" placeholder="530.0" step="0.01" min="0" max="1000" name="sueldo" class="form-control" value="<?php echo isset($InformacionEmpleado['sueldo']) ? $InformacionEmpleado['sueldo'] : ''; ?>" required /> &nbsp;&nbsp;&nbsp;
                                        <h3 class="input-group-addon" id="basic-addon1">USD</h3>
                                    </div>
                                </div>
                            </div>
                            
                            

                            <div class="mb">
                                <label class="form-label"><b>Observación</b></label>
                                <textarea type="text" name="observacion_laboral" class="form-control" placeholder="Comentario u observacion referente a la ficha laboral" style="height: 120px;"> <?php echo isset($InformacionEmpleado['observacion_laboral']) ? $InformacionEmpleado['observacion_laboral'] : ''; ?></textarea>
                            </div>
                            
                            
                            
                        </div>

                        <div class="col-sm">
                            <div class="mb-3">
                                <label class="form-label"><b>Cargo</b></label>
                                <input type="text" name="cargo" class="form-control" value="<?php echo isset($InformacionEmpleado['cargo']) ? $InformacionEmpleado['cargo'] : ''; ?>" required />
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label"><b>Provincia</b></label>
                                <br>
                                
                                <select name="provincia_trabajo" class="form-select" required>
                                    <option selected value="">Escoja una provincia</option>
                                    <?php
                                    $provincias = array(
                                        "Pichincha",
                                        "Guayas",
                                        "Santa Elena",
                                        "Cotopaxi",
                                        "Imbabura"
                                    );
                                    foreach ($provincias as $provincia) {
                                        // Verificamos si el valor del cargo coincide con el valor guardado en $InformacionEmpleado['cargo']
                                        $selected = ($provincia == $InformacionEmpleado['provincia_trabajo']) ? 'selected' : '';
                                        // Imprimimos la opción con el atributo selected si corresponde
                                        echo "<option value='$provincia' $selected>$provincia</option>";
                                    while ($fila = $listadoProvincias) {
                                        echo "<option value='" . $fila['nombre'] . "'>" . $fila['nombre'] . "</option>";
                                    }
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label"><b>Jornada Parcial</b></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jornada_parcial" id="jornada_parcial_si" value="Si" <?php echo (isset($InformacionEmpleado['jornada_parcial']) && $InformacionEmpleado['jornada_parcial'] == 'Si') ? 'checked' : ''; ?> checked>
                                    <label class="form-check-label" for="jornada_parcial_si">
                                        Si
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jornada_parcial" id="jornada_parcial_no" value="No" <?php echo (isset($InformacionEmpleado['jornada_parcial']) && $InformacionEmpleado['jornada_parcial'] == 'No') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="jornada_parcial_no">
                                        No
                                    </label>
                                </div>
                            </div>

                            
                            
                            

                            <!-- <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn_add">
                                    <?php echo isset($InformacionEmpleado['id_empleado']) ? 'Editar' : 'Agregar'; ?> empleado
                                </button>

                            </div> -->

                        </div>
                    </div>
                </div> 
            </div>
            <br>
            <div class="div_botones" id="div_botones">
                <a href="./vista/crear_empleados.php"><button type="submit" class="btn btn-success"><?php echo isset($InformacionEmpleado['id_empleado']) ? 'Editar' : 'Añadir'; ?> empleado</button></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="./visualizar_reporte.php"><button type="button" class="btn btn-warning">Reporte</button></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="../index.php"><button type="button" class="btn btn-danger">Salir</button></a> &nbsp;&nbsp;&nbsp;&nbsp;   
            </div>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary btn_add">
        <?php echo isset($InformacionEmpleado['id_empleado']) ? 'Editar' : 'Agregar'; ?> empleado
    </button>
    
    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    

    <!------------------css para la tabla de empleados-------------------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script>
    

    <script>
        function validarCampos() {
            var nombre = document.getElementById('nombre').value;
            var errorNombre = document.getElementById('error-nombre');

            var email = document.getElementById('email').value;
            var errorEmail = document.getElementById('error-email');

            var cedula = document.getElementById('cedula').value;
            var errorCedula = document.getElementById('error-cedula');

            // Validación de nombre
            if (nombre.trim() === '') {
                errorNombre.textContent = 'Por favor, ingresa tu nombre.';
                return false;
            } else {
                errorNombre.textContent = '';
            }

            // Validación de email
            if (email.trim() === '') {
                errorEmail.textContent = 'Ingrese su correo electrónico';
                return false;
            } else if (!validarEmail(email)) {
                errorEmail.textContent = 'Correo electrónico inválido. Por favor verifique el correo';
                return false;
            } else {
                errorEmail.textContent = '';
            }

            if (cedula.trim() === '') {
                errorCedula.textContent = 'Ingrese su cédula';
                return false;
            } else if (!validarCedula(cedula)) {
                errorCedula.textContent = 'Cédula incorrecta. Por favor verifique la cédula';
                return false;
            } else {
                errorCedula.textContent = '';
            }

            return true;
        }

        function validarEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }

        function validarCedula(cedula) {
            var validacionCedula = /^[0-9]{10}$/;
            return validacionCedula.test(cedula);
        }
    </script>

    <script>
        function redireccionarDatosLaborales() {
            var siguienteApartado = document.getElementById('disabled-tabpanel-1');
            siguienteApartado.scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</form>
</body>
</html>