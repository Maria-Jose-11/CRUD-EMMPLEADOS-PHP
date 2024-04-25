<div class="table-responsive">
    <table class="table table-hover" id="TablaEmpleados">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Cédula</th>
                <!-- <th scope="col">Cargo</th>
                <th scope="col">Estado</th> -->
                <th scope="col">Foto</th>
                <th scope="col">.</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($empleados as $empleado) { ?>
                <tr id="empleado_<?php echo $empleado['id_empleado']; ?>">
                    <td><?php echo $empleado['nombres']; ?> <?php echo $empleado['apellidos']; ?></td>
                    <td><?php echo $empleado['cedula']; ?></td>
                    <!-- <td><?php echo $empleado['cargo']; ?></td>
                    <td><?php echo $empleado['estado']; ?></td> -->
                    <td>
                        <img class="rounded-circle" src="public/imagenes_empleados/<?php echo $empleado['foto']; ?>" alt=<?php echo $empleado['nombres']; ?> width="50" height="50">
                    </td>
                    <td>
                        <a title="Editar" href="index.php?id_empleado=<?php echo $empleado['id_empleado']; ?>" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>