<?php 
    session_start();
    require "../config/config.php";
    if(isset($_POST['signin'])) {
        $login = $konek->query("SELECT * FROM user WHERE username='$_POST[username]' AND MD5('$_POST[pasword]')");
        if(mysqli_num_rows($login)) {
            $_SESSION['username'] = $_POST['username'];
            header("Location: ../manager/index.php");
        }
    }

?>