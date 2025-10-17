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

    public function AllRoomGet()
    {
        $result = $this->db->prepare("SELECT * FROM `rooms-table`");
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCalendarTotalReservation()
    {
        $reservation = $this->db->prepare("");
    }

    public function getRoomTypeCount()
    {
        // İki tane veri gelir room ismi ve ondan kaçtane olduğu gelir.
        $roomtype = $this->db->prepare("
            SELECT 
	            MIN(`room-name`) AS sample_room,
                COUNT(*) AS room_count
            FROM `rooms-table`
            GROUP BY `capacity`
            ORDER BY room_count DESC;
        ");

        $roomtype->execute();
        return $roomtype->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllRoomCount()
    {

        $result = $this->db->prepare("SELECT COUNT('room-name') FROM `rooms-table` ");

        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countTotalPrice()
    {
        $result = $this->db->prepare("
        SELECT 
	        COUNT(DISTINCT di.room_id) AS reservation
            ,((COUNT(DISTINCT di.room_id)) * 100) / COUNT('rt.room-name') AS percenttotal
            ,COUNT('rt.room-name') AS totalroom
            ,SUM(rt.price) AS sumtotal
        FROM `date-information` di  INNER JOIN `rooms-table` rt ON di.room_id = rt.id");

        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function percentTotal() {}
}
