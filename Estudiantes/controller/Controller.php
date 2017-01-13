<?php

require_once '../model/ModeloEstudiantes.php';
session_start();
$estudianteModel = new ModeloEstudiantes();
$opcion = $_REQUEST['opcion'];
//clean whatever message previous
unset($_SESSION['mensaje']);

switch($opcion){
    
    case "listar":
        $listado = $estudianteModel->getEstudiantes();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;
    
    case "crear":
        header('Location: ../view/Crear.php');
        break;
    
    case "guardar":
        $cedula = $_REQUEST['cedula'];
        $nombres = $_REQUEST['nombres'];
        $apellidos = $_REQUEST['apellidos'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        
        try {
            $estudianteModel->crearEstudiante($cedula, $apellidos, $nombres, $direccion, $telefono);
        } catch (Exception $e){
            //colocamos mesaage of exception in session
            $_SESSION['mensaje']=$e->getMessage();
        }
        
        $listado = $estudianteModel->getEstudiantes();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        
        header('Location: ../index.php');
        break;
    
    case "eliminar":
        //obtenemos el codigo del producto a eliminar:
        $codigo=$_REQUEST['codigo'];
        //eliminamos el producto:
        $estudianteModel->eliminarEstudiante($codigo);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $estudianteModel->getEstudiantes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;
    
    case "cargar":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $codigo=$_REQUEST['codigo'];
        $estu=$estudianteModel->getEstudiante($codigo);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['estu']=$estu;
        header('Location: ../view/Actualizar.php');
        break;
    
    case "actualizar":
        //obtenemos los datos modificados por el usuario:
        $cedula=$_REQUEST['cedula'];
        $apellidos=$_REQUEST['apellidos'];
        $nombres=$_REQUEST['nombres'];
        $direccion=$_REQUEST['direccion'];
        $telefono=$_REQUEST['telefono'];
        //actualizamos los datos del producto:
        $estudianteModel->actualizarEstu($cedula, $apellidos, $nombres, $direccion, $telefono);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $estudianteModel->getEstudiantes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;
    
    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../index.php');
}