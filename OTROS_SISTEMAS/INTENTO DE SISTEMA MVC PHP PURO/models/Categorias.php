<?php

include_once "./db/conexion.php";

class Categorias
{

    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getCategorias()
    {
        $sql = "SELECT * FROM categorias";
        $result = $this->conn->query($sql);
        $categorias = [];
        while ($row = $result->fetch_assoc()) {
            $categorias[] = new Categoria($row['id'], $row['nombre'], $row['descripcion']);
        }
        return $categorias;
    }
    public function getCategoriaById($id)
    {
        $sql = "SELECT * FROM categorias WHERE id = $id";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return new Categoria($row['id'], $row['nombre'], $row['descripcion']);
        } else {
            return null;
        }
    }
    public function createCategoria($nombre, $descripcion)
    {
        $sql = "INSERT INTO categorias (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
        $this->conn->query($sql);
        return $this->conn->insert_id;
    }
    public function updateCategoria($id, $nombre, $descripcion)
    {
        $sql = "UPDATE categorias SET nombre='$nombre', descripcion='$descripcion' WHERE id=$id";
        $this->conn->query($sql);
    }
    public function deleteCategoria($id)
    {
        $sql = "DELETE FROM categorias WHERE id=$id";
        $this->conn->query($sql);
    }
}
