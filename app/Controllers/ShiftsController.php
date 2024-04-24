<?php
namespace App\Controllers;

use App\Models\ShiftsModel;
//session_start();

class ShiftsController
{
    protected $shiftsModel;

    public function __construct()
    {
        $this->shiftsModel = new ShiftsModel();
    }

    public function updateShifts()
    {
        include '../app/Views/Shifts/update.php';

    }
}