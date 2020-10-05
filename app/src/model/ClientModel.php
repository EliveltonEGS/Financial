<?php

namespace App\Model;

use Exception;
use App\DB\Sql;

class ClientModel
{

    private $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function create($client): void
    {
        try {
            if (empty($client->name) && empty($client->cpf) && empty($client->balance) && empty($client->agency) && empty($client->account)) {
                echo json_encode("All inputs required.");
            } else {
                $this->sql->query("INSERT INTO client 
                (name, cpf, balance, agency, account) 
              VALUES 
                (:name, :cpf, :balance, :agency, :account)", array(
                    ":name" => $client->name,
                    ":cpf" => $client->cpf,
                    ":balance" => $client->balance,
                    ":agency" => $client->agency,
                    ":account" => $client->account
                ));
            }
        } catch (Exception $ex) {
            echo json_encode($ex->getMessage());
        }
    }

    public function getAll()
    {
        try {
            return $this->sql->select("SELECT * FROM client");
        } catch (Exception $ex) {
            echo json_encode($ex->getMessage());
        }
    }

    public function balance($cpf)
    {
        try {
            if (empty($cpf)) {
                json_encode("Cpf is required.");
            } else {
                return $this->sql->select(
                    "SELECT * FROM client WHERE cpf = :cpf",
                    array(
                        ":cpf" => $cpf
                    )
                );
            }
        } catch (Exception $ex) {
            echo json_encode($ex->getMessage());
        }
    }
}
