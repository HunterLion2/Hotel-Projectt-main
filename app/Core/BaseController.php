<?php

namespace App\Core;

use Dotenv\Dotenv;

class BaseController
{
    // protected $settings = [];
    // protected $categories = [];
    // protected $cartItemCount = 0;
    // protected $userId;

    /**

     * BaseController constructor.
     * Oturum başlatma ve oturum süresi ayarlama

     **/
    public function __construct()
    {
        // Oturum başlatma ve oturum süresi ayarlama
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION)) {
            $_SESSION = [];
        }
    }

    /**
     * @param string $view Görünüm dosyası
     * @param array $data Görünüme aktarılacak veri
     * @param int $statusCode HTTP durum kodu
     */

    // Kullanıcı Sayfası

    public function render($view, $data = [], $statusCode = 200)
    {
        http_response_code($statusCode);

        // // Settings verilerini $data içine dahil et
        // $data['settings'] = $this->settings;
        // $data['categories'] = $this->categories;
        // $data['cartItemCount'] = $this->cartItemCount;

        $data['session'] = $_SESSION ?? [];

        // Verileri kullanılabilir hale getirme
        extract($data);

        // Layout ve view dosyalarını dahil et
        require_once __DIR__ . "/../../views/$view.php";
        require_once __DIR__ . "/../../views/layouts/front/footer.php";
    }

    /**
     * Admin view render etme metodu
     *
     * @param string $view Görünüm dosyası
     * @param array $data Görünüme aktarılacak veri
     */

    // Admin Sayfası
    public function renderAdmin($view, $data = [])
    {

        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $allowedIPsString = $_ENV['ALLOWED_ADMIN_IPS'];
        $accessIp = array_map('trim', explode(',', $allowedIPsString));

        $currentIp = $this->getRealIP();


        if (in_array($currentIp, $accessIp, true)) {
            $data['session'] = $_SESSION;

            // Verileri kullanılabilir hale getirme
            extract($data);


            // Giriş Bölümünü ekle buraya
            require_once __DIR__ . "/../../views/layouts/admin/header.php";
            require_once __DIR__ . "/../../views/$view.php";
            require_once __DIR__ . "/../../views/layouts/admin/footer.php";
        } else {
            http_response_code(404);
            echo "
            <!DOCTYPE html>
        <html>
        <head>
            <title>404 - Erişim Reddedildi</title>
            <style>
                body { 
                    font-family: Arial, sans-serif; 
                    text-align: center; 
                    padding: 50px; 
                    background: #f8f9fa;
                }
                .error-container {
                    max-width: 500px;
                    margin: 0 auto;
                    background: white;
                    padding: 2rem;
                    border-radius: 10px;
                    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                }
                h1 { color: #dc3545; margin-bottom: 1rem; }
                p { color: #6c757d; line-height: 1.6; }
                .ip-info { 
                    background: #f8f9fa; 
                    padding: 1rem; 
                    border-radius: 5px; 
                    margin-top: 1rem;
                    font-family: monospace;
                }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <h1>🚫 Erişim Reddedildi</h1>
                <p>Bu sayfaya erişim yetkiniz bulunmamaktadır.</p>
            </div>
        </body>
        </html>
            
            ";
            exit;
        }
    }

    public function getRealIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            return $_SERVER['HTTP_CF_CONNECTING_IP'];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }

        return 'unknown';
    }
}
