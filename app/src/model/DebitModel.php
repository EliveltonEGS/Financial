<?php

namespace App\Model;

use Exception;
use App\DB\Sql;

class DebitModel
{

    private $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function create($debit): void
    {
        try {
            if (empty($debit->cpf) && empty($debit->value) && empty($debit->id_client)) {
                echo json_encode("Value is required.");
            } else {
                $results = $this->sql->select(
                    "SELECT * FROM client WHERE cpf = :cpf AND (balance - :value) > 0",
                    array(
                        ":cpf" => $debit->cpf,
                        ":value" => $debit->value
                    )
                );

                if (!count($results) > 0) {
                    echo json_encode("Error at Debit.");
                } else {
                    if (empty($debit->value)) {
                        echo json_encode("Value is required.");
                        exit;
                    } else if (empty($debit->id_client)) {
                        echo json_encode("Id_client is required.");
                        exit;
                    } else {
                        $this->sql->query("INSERT INTO debit (value, id_client) "
                            . "VALUES (:value, :id_client)", array(
                            ":value" => $debit->value,
                            ":id_client" => $debit->id_client,
                        ));

                        $this->sql->query(
                            "UPDATE client AS A INNER JOIN debit AS B ON A.id = B.id_client SET A.balance = A.balance - :value WHERE A.cpf = :cpf AND B.id_client = :id_client AND A.balance > 0",
                            array(
                                ":value" => $debit->value,
                                ":cpf" => $debit->cpf,
                                ":id_client" => $debit->id_client
                            )
                        );
                    }
                    echo json_encode("Debit with success.");
                }
            }
        } catch (Exception $ex) {
            echo json_encode($ex->getMessage());
        }
    }
}
