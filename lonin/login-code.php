<?php
require_once 'functions.php';
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["passwords"];
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);


            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if (password_verify($password, $user["password"])) {
if (isset($_GET["formcart"])) {
    
    redirect('حطو رابط الكارت', "Login Successfull.");
}



                if ($user["role"]== 1) {
                    $_SESSION["user"] = "yes";
                    $_SESSION["id"] = $user["id"];
                    redirect('login.html', "Login Successfull.");
exit();
                }
                $_SESSION["user"] = "yes";
                $_SESSION["id"] = $user["id"];
                
                redirect('myaccount.php', "Login Successfull.");
            } else {
                $_SESSION["user"] = "yes";
                redirect('login1.php', "Password does not match.");
            }
        } else {echo "<div class='alert alert-danger'>Email does not match</div>";
            $_SESSION["user"] = "yes";
            redirect('login1.php', "Email does not match.");
        }
