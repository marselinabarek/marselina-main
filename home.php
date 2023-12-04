<?php
    session_start();

    include("config/database.php");
    if(!isset($_SESSION['valid'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Beranda</title>
</head>
<body>
    <div class="navbar">
        <a href="index.php" class="nav-logo">Marselina<span>Corp</span>.</a>

        <div class="right-links">
            <?php
                $id = $_SESSION['id'];
                $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

                while ($result = mysqli_fetch_assoc($query)) {
                    $res_name = $result['name'];
                    $res_uname = $result['username'];
                    $res_email = $result['email'];
                    $res_id = $result['id'];
                }

                echo "<a href='edit.php?id=$res_id' class='btn btn-edit'>Edit Profile</a>";
            ?>
            <a href="config/logout.php"> <button class="btn btn-logout">Keluar </button></a>
        </div>
    </div>

    <main>
        <div class="main-box top">
            <img src="img/welcome.jpg" alt="" width="420px">
            <div class="top">
                <div class="box">
                    <p>Hai <b><?= $res_name ?></b>, Selamat datang!</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>Your email is <b><?= $res_email ?></b></p>
                </div>
                <div class="box">
                    <p>Your username is <b><?= $res_uname ?></b></p>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <span>&copy; Copyright : 21552011358 | Marselina Barek Aran | TIF RP 221 PC </span>
    </footer>
</body>
</html>