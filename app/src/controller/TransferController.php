<?php

namespace App\Controller;

use App\Model\TransferModel;

class TransferController
{
    private $transfertModel;

    public function __construct()
    {
        $this->transfertModel = new TransferModel();
    }

    public function create($transer): void
    {
        $this->transfertModel->create($transer);
    }
}
