<?php
class Cliente
{
    private $id;
    private $nombre;
    private $apellido;
    private $razonsocial;
    private $documento;
    private $telefono;
    private $correo;
    private $pais;
    private $ciudad;


    public function __construct($id, $nombre, $apellido, $razonsocial, $documento, $telefono, $correo, $pais, $ciudad)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->razonsocial = $razonsocial;
        $this->documento = $documento;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->pais = $pais;
        $this->ciudad = $ciudad;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getRazonsocial()
    {
        return $this->razonsocial;
    }

    public function setRazonsocial($razonsocial)
    {
        $this->razonsocial = $razonsocial;

        return $this;
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }
}
