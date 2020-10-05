<?php
require_once("../../../../vendor/autoload.php");

use App\Controller\ExtractController;

header('Content-Type: application/json');

$cpf = $_GET["cpf"];

if (isset($cpf)) :
    $extractController = new ExtractController();
    $results = $extractController->extract($cpf);

    echo json_encode($results);
endif;
