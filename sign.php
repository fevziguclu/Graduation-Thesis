<?php  
session_start();
$con = mysqli_connect('localhost', 'root', '', 'tarekor-clone'); 
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$passsword = $_POST['passsword'];

$query = "SELECT * FROM userdatasss WHERE username='$email' AND passsword='$passsword'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['id']; 
    echo "<p>Login successful</p>";
    header('Location: index.html');
    exit();
} else {
    echo "<p>Login failed. Please check your email and password.</p>";
    header('Location: login.html');
    exit();
}
?>
