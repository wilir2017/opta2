<?php
    include 'Database.php';
    include 'EntidadEstudiantes.php';

class ModeloEstudiantes {
    
    public function getEstudiantes(){  //sirve pa consultar all productos no mas....si dice obtenga lista de productos con descuento  debo crear otro metodo
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        
        $sql = "select * from estudiante";
                    
        $resultado = $pdo->query($sql); //object type matriz porque represent tabla relacional 
        //transformamos los registros en objetos de tipo Producto:
        $listado = array();//creo array de objects called $listado
        foreach ($resultado as $res){//con $res accedo   cada fila...Transformacion de Registro a Object PHP
            $estudiante = new EntidadEstudiantes();
            $estudiante->setCedula($res['cedula']);//$res['codigo']==>get data od each column
            $estudiante->setApellidos($res['apellidos']);
            $estudiante->setNombres($res['nombres']);
            $estudiante->setDireccion($res['direccion']);
            $estudiante->setTelefono($res['telefono']);
            array_push($listado, $estudiante);
        }
        Database::disconnect();//si no se desconecta se satura el bdd
        //retornamos el listado resultante:
        return $listado;
    }
    
    public function crearEstudiante($cedula,$apellidos,$nombres,$direccion,$telefono){
        //Preparamos la conexion a la bdd:
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Preparamos la sentencia con parametros:
        
        $sql="insert into estudiante (cedula,apellidos,nombres,direccion,telefono) values(?,?,?,?,?)";
        
        
        $consulta=$pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try{
               $consulta->execute(array($cedula,$apellidos,$nombres,$direccion,$telefono));
        }catch(PDOException $e){
            Database::disconnect(); 
            throw new Exception ($e->getMessage());
        }
    }
    
    public function eliminarEstudiante($codigo){
        //Preparamos la conexion a la bdd:
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="delete from estudiante where cedula=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($codigo));
        Database::disconnect();
    }
    
    
    public function getEstudiante($codigo){//busca un producto en especifico y muestar information of it..mas no un array 
        $pdo = Database::connect();
        //Utilizamos parametros para la consulta:
        $sql = "select * from estudiante where cedula=?";//codigo=?
        $consulta = $pdo->prepare($sql);//check la sintaxis de sentencia sql 
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($codigo));//creo un array y le paso el  parameter 
        //Extraemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);//execute la extraccion, return a object
        //Transformamos el registro obtenido a objeto:
        $estudiante=new EntidadEstudiantes();
        $estudiante->setCedula($res['cedula']);//$res['codigo']==>get data od each column
        $estudiante->setApellidos($res['apellidos']);
        $estudiante->setNombres($res['nombres']);
        $estudiante->setDireccion($res['direccion']);
        $estudiante->setTelefono($res['telefono']);
        Database::disconnect();
        return $estudiante;
    }
    
    public function actualizarEstu($cedula,$apellidos,$nombres,$direccion,$telefono){
        //Preparamos la conexión a la bdd:
        $pdo=Database::connect();
        $sql="update estudiante set apellidos=?, nombres=?, direccion=?, telefono=? where cedula=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($apellidos,$nombres,$direccion,$telefono, $cedula));
        Database::disconnect();
    }
}
