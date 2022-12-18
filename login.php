<?php
require_once("config.php");

session_start();
if((isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "")) {
    header('location: index.php');
}

?>




<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <div class="box">
            <center>
                <form action="" method="post">
                    <div class="inputBox">
                        <input type="text" name="username" class="username" required>
                        <label>Kullanıcı Adı</label>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="password" class="password" required>
                        <label>Şifre</label>
                    </div>
                    <input type="submit" value="Giriş Yap" name="login">
                </form>
                <p style="color: white;">Copyright © 2022 - <a href="http://www.ugurcan.live" style="text-decoration: none;" target="_blank">Uğur CAN</a></p>
            </center>
            
        </div>
    </body>
</html>



<?php    

if(isset($_POST['username']) && ($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    try {
        $stmt = $connection->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
        $stmt->bindParam('username', $username, PDO::PARAM_STR);
        $stmt->bindParam('password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($count == 1 && !empty($row)) {
            if( $row['status'] == 1){
                session_reset();
                $_SESSION['sess_user_id'] = $row['id'];
                $_SESSION['sess_username'] = $row['username'];
                $_SESSION['sess_role'] = $row['role'];
                $_SESSION['sess_upload_status'] = $row['upload_status'];
                header('location: index.php');
            } else {
                echo "<script>Swal.fire('', 'Kullanıcı adı veya parola yanlış.', 'error')</script>";
            }
		} else {
			echo "<script>Swal.fire('', 'Kullanıcı adı veya parola yanlış.', 'error')</script>";
		}
    } catch (PDOException $e) {
        echo "Error : ".$e->getMessage();
        }
}

?>