<?php  
session_start();
$con = mysqli_connect('localhost', 'root', '', 'tarekor-clone'); 
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$passsword = $_POST['passsword'];

$query = "SELECT * FROM userdatasss WHERE username='$email'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Bu kullanıcı zaten mevcut.";
} else {
    $query = "INSERT INTO userdatasss(username, passsword) VALUES ('$email', '$passsword')";
    if (mysqli_query($con, $query)) {
        echo "Yeni kullanıcı başarıyla eklendi.";
    } else {
        echo "Kullanıcı eklenirken bir hata oluştu: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
