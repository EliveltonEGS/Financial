<?php

namespace App\Controller;

class ClientController
{

    private $clientModel;

    public function __construct()
    {
        $this->clientModel = new \App\Model\ClientModel();
    }

    public function create($client): void
    {
        $this->clientModel->create($client);
    }

    public function getAll()
    {
        return $this->clientModel->getAll();
    }

    public function balance($cpf)
    {
        return $this->clientModel->balance($cpf);
    }
}
