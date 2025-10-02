<?php
// Authentication functions
require 'config.php';
require 'helpers.php';
session_start();

$method = $_SERVER['REQUEST_METHOD'];
$input = getJsonInput();

/*
isset() ka matlab simple words me:

PHP me isset($variable) 
check karta hai ki wo variable exist karta hai aur NULL nahi hai.
Agar variable set hai aur NULL nahi hai,
to ye true return karta hai, warna false.

*/

// Yaha check ho raha hai ki request POST method se aayi hai ya nahi.
// (POST ka use tab hota hai jab hum form data bhejte hai, jaise register/login)

if ($method === 'POST') {
    if (isset($_GET['action'])) {
        /*
        isset() check karta hai ki action naam ka parameter URL me diya hai ya nahi.
        Example: api.php?action=register
        */

        $action = $_GET['action'];

        /*
        Agar action diya hai, uska value $action me store kar liya.
        (register/login ho sakta hai)
        */

        if ($action === 'register') {
            // Agar action register hai, toh user ko register karne wala code chalega.

            $username = $input['username'] ?? '';
            $email = $input['email'] ?? '';
            $password = $input['password'] ?? '';

            /*
            Yeh check karta hai ki input array me username/email/password hai ya nahi.
            Agar hai toh value le lo.
            Agar nahi hai toh empty string ('') set kar do.
            (yeh ?? '' isko bolte hai null coalescing operator)
            yeh ensure karta hai ki agar koi field missing ho toh bhi code crash na ho.
            */

            if (!$username || !$email || !$password) {
                sendJsonResponse(['error' => "All fields are required"], 400);
                // Agar koi field missing hai toh error bhej do.
                // 400 ka matlab bad request.
            }
            
            $hash = password_hash($password, PASSWORD_BCRYPT);

//          Yeh password ko hash (encrypt) karta hai using BCRYPT algorithm.
//          Matlab password directly database me save nahi hota, uska ek secure encrypted form save hota hai.

            $stmt = $pdo -> prepare('INSERT INTO users (username,email,password) VALUES (?,?,?)');
            // Yeh SQL statement prepare karta hai user ko database me insert karne ke liye.
            // ? placeholder hai → yaha pe values baad me bind hongi.

            try {
                $stmt -> execute([$username, $email, $hash]);
                // Yeh prepared statement ko execute karta hai with actual values.
                // $password ki jagah $hash use kar rahe hai for security.
                sendJsonResponse(['message' => 'User registered successfully']);
                // Agar sab kuch theek raha toh success message bhej do.
            } catch (PDOException $e) {
                sendJsonResponse(['error' => 'User registration failed'], 500);
                // Agar koi error aata hai toh error message bhej do.
            }
        }elseif($action === 'login'){
            // Agar action Login hai toh user ko login karne wala code chalega.

            
        }
    }
}
