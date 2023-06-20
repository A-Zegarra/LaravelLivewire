<?php

class Comprobante
{
    private $id;
    private $idTipoComprobante;
    private $idCliente;
    private $idUsuario;
    private $fecha;
    private $hora;
    private $total;


    public function __construct($idTipoComprobante, $idCliente, $idUsuario, $fecha, $hora, $total)
    {
        $this->idTipoComprobante = $idTipoComprobante;
        $this->idCliente = $idCliente;
        $this->idUsuario = $idUsuario;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->total = $total;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdTipoComprobante() {
        return $this->idTipoComprobante;
    }

    public function setIdTipoComprobante($idTipoComprobante) {
        $this->idTipoComprobante = $idTipoComprobante;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    
}
