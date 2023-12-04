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
            $username = $_POST['username'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $verify_query = mysqli_query($conn, "SELECT username, email FROM users WHERE username='$username' OR email='$email'");

            if (mysqli_num_rows($verify_query) != 0) {
                echo "<div class='message-error'>
                    <p>Emai atau Username sudah terdaftar!</p>
                </div> <br>";

                echo "<a href='javascript:self.history.back()'> <button class='btn'> Kembali </button></a>";
            } else {
                mysqli_query($conn, "INSERT INTO users(name, username, email, password) VALUES('$name', '$username', '$email', '$password')") or die("Register error!");

                echo "<div class='message-success'>
                    <p>Pendaftaran berhasil!</p>
                </div> <br>";

                echo "<a href='login.php'> <button class='btn'> Masuk! </button></a>";
            }
        } else {
        ?>
        <header>Daftar dahulu.</header>

            <form action="" method="post">
                <input type="text" name="name" id="name" placeholder="Masukkan Nama">
                <input type="text" name="username" id="username" placeholder="Masukkan Username">
                <input type="text" name="email" id="email" placeholder="Masukkan Email">
                <input type="password" name="password" id="password" placeholder="Masukkan password">
                <input type="submit" value="Daftar" name="submit" class="submit">
                <div class="link-direct">
                    <span>Sudah punya akun? <a href="login.php">Login</a></span>
                </div>
            <?php } ?>
            </form>
    </div>
    <footer class="footer">
        <span>&copy; Copyright : 21552011358 | Marselina Barek Aran | TIF RP 221 PC </span>
    </footer>
</body>

</html>