<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <title>Marselina Company</title>
</head>

<body>
    <nav class="navbar-login">
        <a href="index.html" class="nav-logo">Marselina<span>Corp</span>.</a>
    </nav>
    <div class="box-form">
        <?php

        include("config/database.php");
        if (isset($_POST['submit'])) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'") or die("Select error");
            $row = mysqli_fetch_assoc($result);

            if (is_array($row) && !empty($row)) {
                $_SESSION['valid'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
            } else {
                echo "<div class='message-error'>
                    <p>Email atau password salah!</p>
                </div> <br>";

                echo "<a href='login.php'> <button class='btn'> Coba lagi! </button></a>";
            }

            if (isset($_SESSION['valid'])) {
                header("Location: home.php");
            }
        } else {
        ?>
            <header>Login</header>
            <form action="" method="post">
                <input type="text" name="email" placeholder="Masukkan email">
                <input type="password" name="password" placeholder="Masukkan password">
                <input type="submit" name="submit" value="Masuk" class="submit">
                <div class="link-direct">
                    <span>Belum punya akun? <a href="register.php">Daftar</a></span>
                </div>
            </form>

        <?php } ?>
    </div>

    <footer class="footer">
        <span>&copy; Copyright : 21552011358 | Marselina Barek Aran | TIF RP 221 PC </span>
    </footer>
</body>

</html>