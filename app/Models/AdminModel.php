<?php

namespace App\Models;

use App\Core\Database;
use Exception;
use PDO;

class AdminModel
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function AllRoomGet() {
        $result = $this->db->prepare("SELECT * FROM `rooms-table`");
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}
