<?php
require_once("../../../../vendor/autoload.php");

use App\Controller\ClientController;

header('Content-Type: application/json');

$clientContoller = new ClientController();

foreach ($clientContoller->getAll() as $value) {
    echo json_encode($value);
}
