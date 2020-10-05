<?php
require_once("../../../../vendor/autoload.php");

use App\Controller\CreditController;


$data = file_get_contents('php://input');
$credit =  json_decode($data);

if (!empty($data)) :
    $creditController = new CreditController();
    $creditController->create($credit);
    echo json_encode("Inserting with success.");
endif;
