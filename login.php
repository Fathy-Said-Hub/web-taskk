<?php
$host = 'localhost';
$db = 'WatchRate';
$user = 'root'; 
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=localhost;dbname=WatchRate", 'root', '');
    echo "Connection successful.";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

set_time_limit(60); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);
        echo "Message sent successfully!";
    } else {
        echo "Please fill in all fields.";
    }
}

?>