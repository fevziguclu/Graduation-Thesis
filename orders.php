<?php
session_start();

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "tarekor-clone"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
    }

if ($user_id == 3) {
    $sql = "SELECT product_name, price FROM orders";
} else {
    $sql = "SELECT product_name, price FROM orders WHERE user_id = $user_id";
}
    $result = $conn->query($sql);

    $orders = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $orders[] = array(
                'product_name' => $row["product_name"],
                'price' => $row["price"]
            );
        }
    }

    echo json_encode($orders);

    $conn->close();
} else {
    echo "Kullanıcı oturum açmamış veya geçerli bir kullanıcı değil.";
}
?>
