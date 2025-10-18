<?php
// public/index.php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Route;
use App\Middleware\AuthMiddleware;
use App\Core\BaseController;

Route::add('/reservation', 'Front\ReservationController@createReservation', 'POST');
Route::add('/reservation/signandoutinfo', 'Front\ReservationController@signandoutinfo', 'POST');
Route::add('/reservation/getRoomDetails', 'Front\ReservationController@getRoomDetails', 'POST');

Route::add('/', 'Front\HomeController@index');
Route::add('/reservation', 'Front\ReservationController@index');
Route::add('/adminhotel','Admin\AdminController@home');
Route::add('/adminhotel/adminhotelrooms','Admin\AdminController@rooms');
Route::add('/adminhotel/reservation-detail','Admin\AdminController@reservationdetails');
Route::add('/adminhotel/adminhotelroomadd', 'Admin\AdminController@RoomAdd');
Route::add('/adminhotel/adminusers','Admin\AdminController@Users');
Route::add('/adminhotel/signin','Admin\AdminController@Sign');

// Gelen URI'yi al ve yönlendir
$uri = $_SERVER['REQUEST_URI'];
$uri = parse_url($uri, PHP_URL_PATH); // Query string'i kaldır

try {
    Route::dispatch($uri);
} catch (Exception $e) {
    http_response_code(404);
    echo "404 - Sayfa Bulunamadı";
}
