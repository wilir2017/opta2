<?php


class Database {
    //Propiedades estaticas con la informacion de la conexion (DSN):
    private static $dbName = 'estudiantes';
    private static $dbHost = 'mysql23679-optativa2ramirez.jl.serv.net.mx';  // EN CASO LABORAL AQUI SE INSERTA LA IP DE LA MAQ DONDE CORRE DATABASE
    private static $dbUsername = 'root';//Crear otro usuario en caso comercial
    private static $dbUserPassword = 'CDSomt31335';
    //Propiedad para control de la conexion:
    private static $conexion = null;//object contains 

        /**
     * No se permite instanciar esta clase, se utilizan sus elementos
     * de tipo estatico.
     */
    public function __construct() {
        exit('No se permite instanciar esta clase.');
    }

    /**
     * Metodo estatico que crea una conexion a la base de datos.
     * @return type
     */
    public static function connect() {
        // Una sola conexion para toda la aplicacion (singleton):
        if (null == self::$conexion) {
            try {
                self::$conexion = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName,  self::$dbUsername, self::$dbUserPassword);
                //si se cambia de port se le pasa de parameter
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }

    /**
     * Metodo estatico para desconexion de la bdd.
     */
    public static function disconnect() {
        self::$conexion = null;
    }
}
