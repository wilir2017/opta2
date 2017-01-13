<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD ESTUDIANTE</title>
    </head>
    <body>
        <center>
            <h1>CRUD ACADMICO</h1>
            <table>
                <tr>
                    <td>
                        <form action="controller/Controller.php">
                            <input type="hidden" value="listar" name="opcion">
                            <input type="submit" value="Consultar listado">
                        </form>
                    </td>
                </tr>
            </table><br>

            
            
            <table border="1">
                <tr>
                    <th>CEDULA</th>
                    <th>APELLIDOS</th>
                    <th>NOMBRES</th>
                    <th>DIRECCION</th>
                    <th>TELEFONO</th>
                    <th>Eliminar</th>
                    <th>Actualizar</th>
                </tr>
                <?php
                session_start();
                include './model/EntidadEstudiantes.php';
                //verificamos si existe en sesion el listado de productos:
                if (isset($_SESSION['listado'])) {
                    $listado = unserialize($_SESSION['listado']);

                    foreach ($listado as $est) {
                        echo "<tr>";
                            echo "<td>" . $est->getCedula() . "</td>";
                            echo "<td>" . $est->getApellidos() . "</td>";
                            echo "<td>" . $est->getNombres() . "</td>";
                            echo "<td>" . $est->getDireccion() . "</td>";
                            echo "<td>" . $est->getTelefono() . "</td>";
                            //opciones para invocar al controlador indicando la opcion eliminar o cargar
                            //y la fila que selecciono el usuario (con el codigo del producto):
                            
                            echo "<td><a href='controller/Controller.php?opcion=eliminar&codigo=" . $est->getCedula() . "'>eliminar</a></td>";
                            echo "<td><a href='controller/Controller.php?opcion=cargar&codigo=" . $est->getCedula() . "'>actualizar</a></td>";
                            
                        echo "</tr>";
                        
                    }
                } else{
                    echo "No se han cargado datos.";
                }
                
                ?>
                
            </table><br>
            
            <table>
                    <td>
                        <form action="controller/Controller.php">
                            <input type="hidden" value="crear" name="opcion">
                            <input type="submit" value="Ingresar Estudiante">
                        </form>
                    </td>
            </table>
            
            
        </center>
    </body>
</html>
