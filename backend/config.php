<?php
// Database configuration

/*
These are your database credentials.

1. host: where MySQL runs (usually localhost for local dev).

2. db: the database name.

3.user & pass: MySQL username/password (using root with empty password is common in XAMPP but unsafe for production).

4. charset: utf8mb4 supports all Unicode (including emojis).

 */
$host = 'localhost';
$db = 'task_manager_db';
$user = 'root';
$pass = 'Vedant@21';
$charset = 'utf8mb4';

/*
PDO stands for PHP Data Objects.

It’s a database access layer built into PHP that allows you to connect and
work with different databases (not just MySQL) 
in a consistent way.
It also has security benefits (helps prevent SQL injection attacks)
and useful features (like prepared statements).

You create a new PDO instance to connect to the database.
The $options array configures how PDO behaves.

This really helps when working with databases in PHP.

*/

/*
1.DSN (Data Source Name): a string PDO uses to know which driver (mysql) and 
what host/db/charset to connect to.

2.PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION → 
throw exceptions on DB errors so you can catch them.

3.PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC → 
rows returned as associative arrays ($row['title']) by default.

4. PDO::ATTR_EMULATE_PREPARES => false → use real prepared statements (more secure).

 */
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [

    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,

    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

    PDO::ATTR_EMULATE_PREPARES   => false,

];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database Connection Failed']);
    exit;
}
?>