<?php

namespace App\Controller;

use App\Model\DebitModel;

class DebitController
{

    private $debitModel;

    public function __construct()
    {
        $this->debitModel = new DebitModel();
    }

    public function create($debit): void
    {
        $this->debitModel->create($debit);
    }
}
