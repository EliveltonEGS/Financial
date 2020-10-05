<?php

namespace App\Model;

use Exception;
use App\DB\Sql;

class ExtractModel
{
    private $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function extract($cpf)
    {
        try {
            if (empty($cpf)) {
                echo json_encode("Cpf is required.");
            } else {
                return $this->sql->select(
                    "SELECT CLI.id, CLI.name AS NAME, CLI.cpf AS CPF, CLI.balance AS BALANCE, CRE.id AS ID_CREDIT, CRE.id_client AS ID_CLIENT, CRE.value AS VALUE_CREDIT, DE.id AS ID_DEBIT, DE.id_client AS ID_DEBIT, DE.value AS VALUE_DEBIT, TRA.id AS ID_TRANSFER, TRA.id_client AS ID_CLIENT, TRA.value AS VALUE_TRANSFER FROM client AS CLI LEFT JOIN credit AS CRE ON CLI.id = CRE.id_client LEFT JOIN debit AS DE ON CLI.id = DE.id_client LEFT JOIN transfer AS TRA ON CLI.id = TRA.id_client WHERE CLI.cpf = :cpf",
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
