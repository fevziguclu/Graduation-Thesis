<?php
session_start();

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "tarekor-clone"; 


$data = json_decode(file_get_contents("php://input"), true);

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo "Error: User session not found";
    exit();
}

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

foreach($data as $item) {
    $product_name = $item['product_name'];
    $price = $item['price'];
    $order_date = date("Y-m-d H:i:s"); 

    $sql = "INSERT INTO orders (user_id, product_name, price, order_date) VALUES ('$user_id', '$product_name', '$price', '$order_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added to cart successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
