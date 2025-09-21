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

    public function home()
    {
        $this->renderAdmin("admin/home");
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
}
