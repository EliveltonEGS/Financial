<?php

namespace App\Model;

use Exception;
use App\DB\Sql;

class TransferModel
{
    private $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function create($transer): void
    {
        try {
            if (empty($transer->cpf) && empty($transer->value) && empty($transer->id_client) && empty($transer->agency) && empty($transer->account)) {
                echo json_encode("All inputs required.");
            } else {
                $results = $this->sql->select(
                    "SELECT * FROM client WHERE cpf = :cpf AND (balance - :value) > 0",
                    array(
                        ":cpf" => $transer->cpf,
                        ":value" => $transer->value
                    )
                );

                if (!count($results) > 0) {
                    echo json_encode("Error at transfer");
                } else {
                    $this->sql->query(
                        "INSERT INTO transfer (value, id_client) VALUES (:value, :id_client)",
                        array(
                            ":value" => $transer->value,
                            ":id_client" => $transer->id_client,
                        )
                    );

                    //subtract
                    $this->sql->query(
                        "UPDATE client AS A SET A.balance = A.balance - :value WHERE A.cpf = :cpf",
                        array(
                            ":value" => $transer->value,
                            ":cpf" => $transer->cpf
                        )
                    );

                    //add
                    $this->sql->query(
                        "UPDATE client AS CLI SET CLI.balance = CLI.balance + :value WHERE CLI.agency = :agency AND CLI.account = :account",
                        array(
                            ":value" => $transer->value,
                            ":agency" => $transer->agency,
                            ":account" => $transer->account
                        )
                    );

                    echo json_encode("Insertin with success.");
                }
            }
        } catch (Exception $ex) {
            echo json_encode($ex->getMessage());
        }
    }
}
