<?php
namespace App\Controllers;

use App\Models\ShiftsModel;
session_start();

class ShiftsController
{
    protected $shiftsModel;

    public function __construct()
    {
        $this->shiftsModel = new ShiftsModel();
    }

    public function list()
    {
        $shiftsModel = new ShiftsModel();
        $shifts = $shiftsModel->getShifts();
        include '../app/Views/Shifts/index.php';
    }
}