<?php

namespace App\Controllers\Admin;

use \App\Core\BaseController;
use App\Core\Database;
use App\Models\AdminModel;

class AdminController extends BaseController
{

    private $db;
    private $roomModel;

    public function __construct()
    {
        parent::__construct();
        $this->db = Database::getInstance();
        $this->roomModel = new AdminModel();
    }

    public function Sign() {
        $this->renderAdmin("admin/sign");
    }

    public function home()
    {

        $data = [];
        $roomtypecount = [];
        $onemountreservationcount = [];
        $monthanalyze = [];

        $data = $this->roomModel->countTotalPrice();
        $roomtypecount = $this->roomModel->getRoomTypeCount();
        $onemountreservationcount = $this->roomModel->MountİnReservation();
        $monthanalyze = $this->roomModel->MonthAnalyze();

        // header("Location : sign.php");
        // exit; 502 Hatası veriyor buna bakıcam.

        $this->renderAdmin("admin/home", [
        'data' => $data,
        'roomcount' => $roomtypecount,
        'onemountcounts' => $onemountreservationcount,
        'analyzemonths' => $monthanalyze
    ]);
    }

    public function rooms()
    {
        $result = [];

        $result = $this->roomModel->AllRoomGet();

        $result = $this->renderAdmin("admin/rooms", ['rooms' => $result]);
    }

    public function RoomAdd()
    {
        $this->renderAdmin("admin/roomadd");
    }

    public function Users()
    {
        $this->renderAdmin("admin/users");
    }

    public function Security() {}
}
