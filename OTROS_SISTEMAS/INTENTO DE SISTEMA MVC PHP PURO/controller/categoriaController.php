<?php
require_once './models/Categorias.php';

class categoriaController
{
    public function index()
    {
        $categorias = new Categorias($this->conn);
        $categorias = $categorias->getClients();
        require_once 'views/index.php';
    }
    public function create()
    {
        require_once 'views/create.php';
    }
    public function store()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $birth = $_POST['birth'];
        $clients = new Clients($this->conn);
        $id = $clients->createClient($name, $email, $birth);
        header('Location: /clients');
    }
    public function show($id)
    {
        $clients = new Clients($this->conn);
        $client = $clients->getClientById($id);
        require_once 'views/show.php';
    }
    public function update($id)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $birth = $_POST['birth'];
        $clients = new Clients($this->conn);
        $clients->updateClient($id, $name, $email, $birth);
        header('Location: /clients');
    }
    public function delete($id)
    {
        $clients = new Clients($this->conn);
        $clients->deleteClient($id);
        header('Location: /clients');
    }
}
