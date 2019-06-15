<?php 
// class Connection{
//     private static $user = 'root';
//     private static $password = 'password';
//     private static $conn = null;


//     static function connect(){
//         try{
//           self::$conn = new PDO('mysql:host=localhost;dbname=docert_tron', self::$user, self::$password);
//           self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//           return self::$conn;
//         } catch(PDOException $e) {
//           echo 'ERROR: ' . $e->getMessage();
//         }
//     }
// }
class Connection{
    private static $user = 'drayocom_usrtron';
    private static $password = 'omfdg2k07';
    private static $conn = null;


    static function connect(){
        try{
          self::$conn = new PDO('mysql:host=localhost;dbname=drayocom_docert', self::$user, self::$password);
          self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return self::$conn;
        } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
        }
    }
}




