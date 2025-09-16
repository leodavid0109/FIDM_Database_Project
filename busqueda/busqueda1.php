<?php
include "../includes/header.php";
?>

<!-- TÍTULO. Cambiarlo, pero dejar especificada la analogía -->
<h1 class="mt-3">Búsqueda 1 - Kilometraje en Pruebas</h1>

<p class="mt-3">
    Dado el número de un piloto y un rango de fechas (f1 y f2, con f2 ≥ f1).
    Se debe mostrar el total de kilometros hechos por el piloto a raíz de las
    pruebas que él analizó dentro de ese rango de fechas, junto con el nombre del piloto.
</p>

<!-- FORMULARIO. Cambiar los campos de acuerdo a su trabajo -->
<div class="formulario p-4 m-3 border rounded-3">

    <!-- En esta caso, el Action va a esta mismo archivo -->
    <form action="busqueda1.php" method="post" class="form-group">

        <div class="mb-3">
            <label for="fecha1" class="form-label">Fecha 1</label>
            <input type="date" class="form-control" id="fecha1" name="fecha1" required>
        </div>

        <div class="mb-3">
            <label for="fecha2" class="form-label">Fecha 2</label>
            <input type="date" class="form-control" id="fecha2" name="fecha2" required>
        </div>

        <div class="mb-3">
            <label for="numPiloto" class="form-label">Número del Piloto</label>
            <input type="number" class="form-control" id="numPiloto" name="numPiloto" required>
        </div>

        <button type="submit" class="btn btn-primary">Buscar</button>

    </form>
    
</div>

<?php
// Dado que el action apunta a este mismo archivo, hay que hacer eata verificación antes
if ($_SERVER['REQUEST_METHOD'] === 'POST'):

    // Crear conexión con la BD
    require('../config/conexion.php');

    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];
    $numPiloto = $_POST["numPiloto"];

    // Query SQL a la BD -> Crearla acá (No está completada, cambiarla a su contexto y a su analogía)
    $query = "SELECT nombre, total_km
                FROM piloto
                INNER JOIN (
                    SELECT analizadaPor, SUM(distancia) AS total_km
                    FROM prueba
                    WHERE analizadaPor = '$numPiloto'
                    AND fecha BETWEEN '$fecha1' AND '$fecha2'
                    GROUP BY analizadaPor
                ) AS distancia_total
                ON piloto.numPiloto = distancia_total.analizadaPor;
                ";

    // Ejecutar la consulta
    $resultadoB1 = mysqli_query($conn, $query) or die(mysqli_error($conn));

    mysqli_close($conn);

    // Verificar si llegan datos
   if($resultadoB1 and $resultadoB1->num_rows > 0):
?>

<!-- MOSTRAR LA TABLA. Cambiar las cabeceras -->
<div class="tabla mt-5 mx-3 rounded-3 overflow-hidden">

    <table class="table table-striped table-bordered">

        <!-- Títulos de la tabla, cambiarlos -->
        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">Nombre Piloto</th>
                <th scope="col" class="text-center">Kilómetros Recorridos</th>
            </tr>
        </thead>

        <tbody>

            <?php
            // Iterar sobre los registros que llegaron
            foreach ($resultadoB1 as $fila):
            ?>

            <!-- Fila que se generará -->
            <tr>
                <!-- Cada una de las columnas, con su valor correspondiente -->
                <td class="text-center"><?= $fila["nombre"]; ?></td>
                <td class="text-center"><?= $fila["total_km"]; ?></td>
            </tr>

            <?php
            // Cerrar los estructuras de control
            endforeach;
            ?>

        </tbody>

    </table>
</div>

<!-- Mensaje de error si no hay resultados -->
<?php
else:
?>

<div class="alert alert-danger text-center mt-5">
    No se encontraron resultados para esta consulta
</div>

<?php
    endif;
endif;

include "../includes/footer.php";
?>