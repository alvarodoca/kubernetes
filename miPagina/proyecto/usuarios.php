<?php
    include "header.php";
?>

<div class="usuarios">

    <h1>¡Bienvenido/a!</h1>

<?php
    $servidor = "localhost:3333";
    $usuario = "root";
    $password = "";
    $basedatos = "f1";

    $conexion = new mysqli($servidor, $usuario, $password, $basedatos);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $dni = $_POST['dni'];
    $contraseña = $_POST['contraseña'];

    $consultar = "SELECT * FROM socios WHERE dni = '$dni'";
    $registros = $conexion->query($consultar);

    if ($dni === 'admin' && $contraseña === 'admin') {
        header("Location: admin.php");
    } else {
        if ($registros->num_rows > 0) {
            $registro = $registros->fetch_row();
            $clase = $registro[6]; 

            echo "<table border='1'>
                <tbody>
                    <tr>
                        <th>DNI</th>
                        <th>NOMBRE</th>
                        <th>APELLIDOS</th>
                        <th>TELEFONO</th>
                        <th>FECHA DE NACIMIENTO</th>
                        <th>CLASE</th>
                    </tr>
                    <tr>
                        <td>{$registro[0]}</td>
                        <td>{$registro[1]}</td>
                        <td>{$registro[2]}</td>
                        <td>{$registro[3]}</td>
                        <td>{$registro[4]}</td>
                        <td>{$registro[6]}</td>
                    </tr>
                </tbody>
            </table>";

            echo "<br><br>";

            if ($clase == 'vip') {
                echo "<p>¡Eres un socio VIP! Tienes un descuento del 20% en todos los artículos y acceso exclusivo a entradas para el siguiente evento de F1.</p>";
                echo "<p><strong>Descuento en artículos:</strong> 20% de descuento en nuestra tienda online.</p>";
                echo "<p><strong>Entradas para el evento:</strong> Tienes acceso gratuito al próximo Gran Premio.</p>";
            } elseif ($clase == 'premiun') {
                echo "<p>¡Gracias por ser un socio Premium! Tienes un descuento del 15% en artículos y acceso prioritario a las entradas para el próximo evento.</p>";
                echo "<p><strong>Descuento en artículos:</strong> 15% de descuento en nuestra tienda online.</p>";
                echo "<p><strong>Entradas para el evento:</strong> Acceso anticipado para la compra de entradas.</p>";
            } elseif ($clase == 'deluxe') {
                echo "<p>¡Eres un socio Deluxe! Disfruta de un descuento del 10% en artículos y entradas para eventos exclusivos.</p>";
                echo "<p><strong>Descuento en artículos:</strong> 10% de descuento en nuestra tienda online.</p>";
                echo "<p><strong>Entradas para el evento:</strong> Acceso exclusivo a eventos de lujo.</p>";
            } elseif ($clase == 'gold') {
                echo "<p>¡Gracias por ser un socio Gold! Tienes un descuento del 5% en artículos y acceso exclusivo a las preventas de entradas.</p>";
                echo "<p><strong>Descuento en artículos:</strong> 5% de descuento en nuestra tienda online.</p>";
                echo "<p><strong>Entradas para el evento:</strong> Acceso exclusivo a preventas de entradas para los próximos eventos.</p>";
            } elseif ($clase == 'general') {
                echo "<p>Gracias por ser un socio General. Disfruta de los eventos públicos y ofertas especiales de temporada.</p>";
                echo "<p><strong>Eventos:</strong> Puedes asistir a todos los eventos públicos y recibir notificaciones de futuros eventos.</p>";
            } elseif ($clase == 'libre') {
                echo "<p>¡Bienvenido a nuestra comunidad! Como socio Libre, puedes disfrutar de nuestros eventos básicos sin ningún beneficio adicional.</p>";
                echo "<p><strong>Eventos:</strong> Acceso a eventos públicos y contenido gratuito.</p>";
            } else {
                echo "<p>No tienes una clase asignada. Por favor, contacta con nuestro soporte para más información.</p>";
            }
        } else {
            echo "<p>No se encontró ningún registro para el DNI proporcionado.</p>";
        }
    }

?>
</div>
<br><br>
<a href="index.php">Volver al Inicio</a>

<?php
    include "footer.php";
?>
