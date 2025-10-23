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

    public function reservationdetails() {
        $this->renderAdmin("admin/reservation-detail");
    }

    public function generalroomdetail() {

        $data = [];

        $data = $this->roomModel->allRoomDetail();
        
        $this->renderAdmin("admin/generalroom-detail", [
            'datas' => $data
        ]);
    }

    public function home()
    {
        $data = [];
        $roomtypecount = [];
        $onemountreservationcount = [];
        $monthanalyze = [];
        $onePerson = [];

        $onePerson = $this->roomModel->OnePerson();
        $data = $this->roomModel->countTotalPrice();
        $roomtypecount = $this->roomModel->getRoomTypeCount();
        $onemountreservationcount = $this->roomModel->MountİnReservation();
        $monthanalyze = $this->roomModel->MonthAnalyze();

        $this->renderAdmin("admin/home", [
        'data' => $data,
        'oneperson' => $onePerson,
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

        $users = [];

        $users = $this->roomModel->getAllUser();

        $users = $this->renderAdmin("admin/users", ['users' => $users]);
    }

}
