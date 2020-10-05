<?php

namespace App\Controller;

use App\Model\ExtractModel;

class ExtractController
{

    private $extractModel;

    public function __construct()
    {
        $this->extractModel = new ExtractModel();
    }

    public function extract($cpf)
    {
        return $this->extractModel->extract($cpf);
    }
}