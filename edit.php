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

    <div class="box-form">
        <?php
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            $id = $_SESSION['id'];
            $edit_query = mysqli_query($conn, "UPDATE users SET username='$username', name='$name', email='$email' WHERE id='$id'") or die("Error 404!");

            if ($edit_query) {
                echo "<div class='message-success'>
                    <p>Profile berhasil diupdate!</p>
                </div> <br>";

                echo "<a href='home.php'> <button class='btn'> Kembali </button></a>";
            } 
        } else {
            $id = $_SESSION['id'];
            $query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");

            while($result = mysqli_fetch_assoc($query)){
                $res_name = $result['name'];
                $res_uname = $result['username'];
                $res_email = $result['email'];
            }
        ?>
        <header>Edit Profil.</header>

            <form action="" method="post">
                <input type="text" name="name" id="name" value="<?= $res_name ?>" autocomplete="off" required>
                <input type="text" name="username" id="username" value="<?= $res_uname ?>" autocomplete="off" required>
                <input type="text" name="email" id="email" value="<?= $res_email ?>" autocomplete="off" required>
                <input type="submit" value="Simpan" name="submit" class="submit">
            </form>
        </div>
        <?php } ?>
    <footer class="footer">
        <span>&copy; Copyright : 21552011358 | Marselina Barek Aran | TIF RP 221 PC </span>
    </footer>
</body>
</html>