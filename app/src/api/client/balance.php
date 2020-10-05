<?php
require_once("../../../../vendor/autoload.php");

use App\Model\ClientModel;


header('Content-Type: application/json');

$cpf = $_GET["cpf"];

if (isset($cpf)) :
    $clientModel = new ClientModel();
    $results = $clientModel->balance($cpf);
    echo json_encode($results);
endif;
