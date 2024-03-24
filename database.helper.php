<?php
require_once 'config.php';

class DatabaseHelper {

    // Property สำหรับเก็บ connection
    private static $connection;

    // Method สำหรับเชื่อมต่อฐานข้อมูล
    public static function connect() {

        if(!self::$connection) {

            // กำหนด global เพื่อใช้ตัวแปรที่อยู่นอก class
            global $db_host, $db_port, $db_username, $db_password, $db_database;

            try {
                // สร้าง Connection
                self::$connection = new PDO(
                    "mysql:host=$db_host;port=$db_port;dbname=$db_database", 
                    $db_username, 
                    $db_password
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo 'Connection successful';
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                exit();
            }
            
        }

        return self::$connection;
    } // end connect

    // Method สำหรับปิดการเชื่อมต่อฐานข้อมูล
    public static function disconnect() {
        self::$connection = null;
    } // end disconnect

}

// Test Connection
// DatabaseHelper::connect();