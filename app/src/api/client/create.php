<?php
require_once("../../../../vendor/autoload.php");

use App\Controller\ClientController;


$data = file_get_contents('php://input');
$client =  json_decode($data);

if (!empty($data)) :
    $clientContoller = new ClientController();
    $clientContoller->create($client);
    echo json_encode("Inserting with success.");
endif;
