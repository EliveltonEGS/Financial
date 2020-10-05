<?php

namespace App\Controller;

use App\Model\CreditModel;

class CreditController
{

    private $creditModel;

    public function __construct()
    {
        $this->creditModel = new CreditModel();
    }

    public function create($credit): void
    {
        $this->creditModel->create($credit);
    }
}
