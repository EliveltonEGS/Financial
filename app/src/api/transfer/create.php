<?php

use App\Controller\TransferController;

require_once("../../../../vendor/autoload.php");

$data = file_get_contents('php://input');
$transer =  json_decode($data);

if (!empty($data)) :
    $transferController = new TransferController();
    $transferController->create($transer);
endif;
