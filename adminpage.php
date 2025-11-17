<?php
    include 'connectdb.php';

    if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $query = "DELETE FROM karyaseni WHERE id='$delete_id'";
    mysqli_query($koneksi, $query);

    echo "<script>alert('Item deleted successfully');</script>";
    echo "<script>window.location='adminpage.php';</script>";
    exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House of Verse</title>
    <link rel="stylesheet" href="generaldesign.css">
    <link href='https://cdn.boxicons.com/3.0.3/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="admincss.css">
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <header class="header">
        <a href="index.php" class="logo">House of Verse</a>

        <nav class="navbar">
            <a href="admininput.php">Input</a>
            <a href="adminpage.php">Index</a>
            <a href="index.php">Logout</a>    
        </nav>
    </header>

    <div class="gallery-index">
        <h2>Admin Page - Manage Artworks and Poems</h2>
        <br>
        <table class="index" border="5">
            <tr>
                <th>TITLE</th>
                <th>AUTHOR</th>
                <th>DESCRIPTION</th>
                <th>YEAR</th>
                <th>PRICE</th>
                <th>IMAGE</th>
                <th>ACTION</th>
            </tr>
            <?php
                include 'connectdb.php';
                $res = mysqli_query($koneksi, "SELECT * FROM karyaseni");
                while($row = mysqli_fetch_assoc($res)) {
                    echo '<tr>';
                    echo '<td>'.$row['namaseni'].'</td>';
                    echo '<td>'.$row['author'].'</td>';
                    echo '<td>'.$row['deskripsi'].'</td>';
                    echo '<td>'.$row['tahun_pembuatan'].'</td>';
                    echo '<td>$'.$row['harga'].'</td>';
                    echo '<td><img src="images/'.$row['gambar'].'" alt="Artwork" width="100"></td>';
                    echo '<td><a href="adminedit.php?id='.$row['id'].'">EDIT</a></td>';
                    echo '<td><a href="?delete_id='.$row['id'].'" onclick="return confirm(\'Are you sure you want to delete this item?\')"> DELETE </a></td>';
                    echo '</tr>';
                }
            ?>   
        </table>
    </div>
    <div class="input">
        <a href="admininput.php"><h2>Input New Artworks or Poems</h2></a>
    </div>
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