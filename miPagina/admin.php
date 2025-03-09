<!--Incluimos nuestro cabecero genérico para todos-->
<?php
    include "header.php";
?>
<!-- Conexión con nuestra base de datos -->
<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $basedatos = "f1";

    $conexion = new mysqli($servidor, $usuario, $password, $basedatos);
# La consulta para la tabla de clasificacion pero que se ordene desde el que tiene mayor puntos hasta el menor.
    $consultar = "SELECT * FROM clasificacion ORDER BY puntos DESC";
    $registros = $conexion->query($consultar);
?>
<div class="altas">
    <p><h1>Editar Puntos De La Clasificación</h1></p>
    <table border="1">
        <tbody>
            <tr>
                <th>POSICION</th>
                <th>EQUIPO</th>
                <th>PUNTOS</th>
            </tr>
<!-- Creo un contador y lo igualo a uno para que empieze desde el uno para que se actualize de medida que los puntos cambian -->
            <?php
                $posicion = 1;
                while ($registro = $registros->fetch_row()) {
            ?>
<!-- el $posicion++ sirve para que vaya en incremento -->
            <tr>
                <td><?php echo $posicion++; ?></td>
                <td><?php echo $registro[1]; ?></td>
                <td><?php echo $registro[2]; ?></td>
                <td><a href="admin2.php?id=<?php echo $registro[0]; ?>"><img src="./img/lapiz.png" width=40px></td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>
    
<!-- Consulta a la base de datos para obtener información de las escuderías -->
    <?php
        $consultar2 = "SELECT * FROM escuderias";
        $registros2 = $conexion->query($consultar2);
    ?>
    <hr>
    <p><h1>Editar Información De Las Escuderias</h1></p>
    <table border="1">
        <tbody>
            <tr>
                <th>ESCUDERIA</th>
                <th>COCHE</th>
                <th>IMAGEN</th>
                <th>COLOR</th>
                <th>PILOTO 1</th>
                <th>PILOTO 2</th>
                <th>DIRECTOR</th>
            </tr>

            <?php
                while ($registro2 = $registros2->fetch_row()) {
            ?>
<!-- Mostrar información de las escuderías y proporcionar enlaces para editar y eliminar -->
            <tr>
                <td><?php echo $registro2[1]; ?></td>
                <td><?php echo $registro2[2]; ?></td>
                <td><?php echo '<img width="100px" src="imagenes/'.$registro2[3].'">';?></td>
                <td><?php echo $registro2[4]; ?></td>
                <td><?php echo $registro2[5]; ?></td>
                <td><?php echo $registro2[6]; ?></td>
                <td><?php echo $registro2[7]; ?></td>
                <td><a href="admin3.php?id=<?php echo $registro2[0]; ?>"><img src="./img/lapiz.png" width=40px></td>
                <td><a href="admin4.php?id=<?php echo $registro2[0]?>"><img src="./img/basura.png" width=40px></td>
            </tr>
            <?php } ?> 
<!-- Opción para añadir nuevos registros o volver al inicio -->
            <tr>
                <th>¿NECESITAS AÑADIR ALGO MÁS?</th>
                <td colspan="2">SI</td>
                <td><a href="admin5.php"><img src="./img/añadir.png" width=50px></a></td>
                <td colspan="2">NO</td>
                <td><a href="index.php"><img src="./img/home.jpg" width=40px></a></td>
            </tr>
 
        </tbody>
    </table>


    <br><br>
    <a href="index.php">Volver al Inicio</a>
</div>
<!-- Incluimos nuestro pie de página genérico para todos -->
<?php
    include "footer.php";
?>
