<?php
include 'connectdb.php';
if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $umur = $_POST['umur'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO user_admin (username, nama, umur, email, password) VALUES ('$username', '$nama', '$umur', '$email', '$password')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo '<script>alert("Register Success")</script>';
        echo '<script>window.location="login.php"</script>';
    } else {
        echo 'Register Failed';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House of Verse</title>
    <link rel="stylesheet" href="generaldesign.css">
    <link rel="stylesheet" href="loginregister.css">
    <link rel="icon" href="logo.png">
    <link href='https://cdn.boxicons.com/3.0.3/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <a href="home.php" class="logo">House of Verse</a>
    </header>
    <form method="post">
        <fieldset id="form">
            <legend><b>Input Register Credentials</b></legend>
            <table border="5" id="table">
                <tr>
                    <td><input type="text" name="nama" placeholder="Full name" required></td>
                </tr>
                <tr>
                    <td><input type="text" name="username" placeholder="Username" required></td>
                </tr>
                <tr>
                    <td><input type="number" name="umur" placeholder="Umur" required></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" placeholder="Email" required></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Password" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="register" value="REGISTER"></td>
                </tr>
            </table>
        </fieldset>
    </form>

    <br>
    <h3>Already have an account? <a href="adminlogin.php"><b>Login here</b></a></h3>
    <br>
    <footer>
        <div class="footercontent">
            <p>© 2024 House of Verse. All rights reserved.</p>
            <p>Designed by Ezra Rajendra Dewa Candra</p>
            <br>
        </div>
    </footer>

</body>
</html>