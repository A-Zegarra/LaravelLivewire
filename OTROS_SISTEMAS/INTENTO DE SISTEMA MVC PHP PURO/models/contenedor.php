<?php

class Contenedor
{
    private $id;
    private $nombre;
    private $fecha;
    private $yuan;
    private $dolar;
    private $gasto1;
    private $gasto2;
    private $gasto3;
    private $gasto4;
    private $idProveedor;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getYuan()
    {
        return $this->yuan;
    }

    public function setYuan($yuan)
    {
        $this->yuan = $yuan;
    }

    public function getDolar()
    {
        return $this->dolar;
    }

    public function setDolar($dolar)
    {
        $this->dolar = $dolar;
    }

    public function getGasto1()
    {
        return $this->gasto1;
    }

    public function setGasto1($gasto1)
    {
        $this->gasto1 = $gasto1;
    }

    public function getGasto2()
    {
        return $this->gasto2;
    }

    public function setGasto2($gasto2)
    {
        $this->gasto2 = $gasto2;
    }

    public function getGasto3()
    {
        return $this->gasto3;
    }

    public function setGasto3($gasto3)
    {
        $this->gasto3 = $gasto3;
    }

    public function getGasto4()
    {
        return $this->gasto4;
    }

    public function setGasto4($gasto4)
    {
        $this->gasto4 = $gasto4;
    }

    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }
}
