<?php

namespace App\Model;

use App\DB\Sql;
use Exception;

class CreditModel
{

    private $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function create($credit): void
    {
        try {
            if (empty($credit->value) && empty($credit->cpf) && empty($credit->id_client)) {
                echo json_encode("Value is required.");
                exit;
            } else {
                $this->sql->query("INSERT INTO credit (value, id_client) "
                    . "VALUES (:value, :id_client)", array(
                    ":value" => $credit->value,
                    ":id_client" => $credit->id_client,
                ));

                $this->sql->query(
                    "UPDATE client AS A INNER JOIN credit AS B ON A.id = B.id_client SET A.balance = A.balance + :value WHERE A.cpf = :cpf AND B.id_client = :id_client",
                    array(
                        ":value" => $credit->value,
                        ":cpf" => $credit->cpf,
                        ":id_client" => $credit->id_client
                    )
                );
            }
        } catch (Exception $ex) {
            echo json_encode($ex->getMessage());
        }
    }
}
