<?php

use App\Controller\DebitController;

require_once("../../../../vendor/autoload.php");

$data = file_get_contents('php://input');
$debit =  json_decode($data);

if (!empty($data)) :
    $debitController = new DebitController();
    $debitController->create($debit);
endif;
