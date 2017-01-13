<?php


class EntidadEstudiantes {
    
    private $cedula;
    private $apellidos;
    private $nombres;
    private $direccion;
    private $telefono;
    
    function getCedula() {
        return $this->cedula;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }


}
