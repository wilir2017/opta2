<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar CRUD</title>
    </head>
    <body>
        <center>

            <?php
                include '../model/EntidadEstudiantes.php';
                //obtenemos los datos de sesion:
                session_start();
                $libro = $_SESSION['estu'];
            ?>
            
            <form action="../controller/Controller.php">
                <h2>Actualizacion de Libro</h2>
                <input type="hidden" value="actualizar" name="opcion">
                <!-- Utilizamos pequeños scripts PHP para obtener los valores del producto: -->
                <input type="hidden" value="<?php   echo $libro->getCedula();   ?>" name="cedula"><br>
                Cedula:<b><?php   echo $libro->getCedula();    ?></b><br><br>
                Nombres:<input type="text" name="nombres" value="<?php  echo $libro->getNombres(); ?>" required="true"><br><br>
                Apellidos:<input type="text" name="apellidos" value="<?php echo $libro->getApellidos(); ?>"  required="true"><br><br>
                Direccion:<input type="text" name="direccion" value="<?php echo $libro->getDireccion(); ?>"  required="true"><br><br>
                Telefono:<input type="text" name="telefono" value="<?php echo $libro->getTelefono(); ?>"  required="true"><br><br>
                <input type="submit" value="Actualizar">
            </form>
        </center>
    </body>
</html>
