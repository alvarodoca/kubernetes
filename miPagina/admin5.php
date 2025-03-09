<?php
    include "header.php";
?>
<div class="altas">
<h1>NUEVO EQUIPO</h1>
<br><br>
    <form action="admin5_1.php" method="post" enctype="multipart/form-data">
        <label for="escuderia">ESCUDERIA:</label>
        <input type="text" id="escuderia" name="escuderia" required><br><br>

        <label for="coche">COCHE:</label>
        <input type="text" id="coche" name="coche" required><br><br>

        <label for="color">COLOR:</label>
        <input type="text" id="color" name="color" required><br><br>

        <label for="piloto1">PILOTO1:</label>
        <input type="text" id="piloto1" name="piloto1" required><br><br>

        <label for="piloto2">PILOTO2:</label>
        <input type="text" id="piloto2" name="piloto2" required><br><br>

        <label for="director">DIRECTOR:</label>
        <input type="text" id="director" name="director" required><br><br>

        <!-- Campo para cargar la imagen -->
        <label for="imagen">IMAGEN:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*"><br><br>

        <input type="submit" value="Enviar"><br><br>
        <input type="reset" value="Borrar">
    </form>
    <br><br>
    <a href="admin.php">Volver a admin</a><br><br>
    <a href="index.php">Volver al Inicio</a>
 
</div>
<?php
    include "footer.php";
?>
