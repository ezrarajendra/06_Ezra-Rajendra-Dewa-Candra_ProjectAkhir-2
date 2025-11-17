<?php
include 'connectdb.php';
if (isset($_POST['input'])) {
    $namaseni = $_POST['namaseni'];
    $author = $_POST['author'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $tahun_pembuatan = $_POST['tahun_pembuatan'];
    $harga = $_POST['harga'];

    $file=$_FILES['gambar']['name'];
    $file_tmp=$_FILES['gambar']['tmp_name'];
    $folder='images/'.$file;

    move_uploaded_file($file_tmp,$folder);

    $query = "INSERT INTO karyaseni (kategori, namaseni, author, deskripsi, tahun_pembuatan, harga, gambar) VALUES ('$kategori', '$namaseni','$author', '$deskripsi', '$tahun_pembuatan', '$harga', '$file')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo '<script>alert("Input success")</script>';
        echo '<script>window.location="adminpage.php"</script>';
    } else {
        echo 'Input failed';
    }

    if(move_uploaded_file($file_tmp, $folder))
    {
        echo 'File uploaded successfully';
    }
    else
    {
        echo 'Failed to upload file';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House of Verse</title>
    <link rel="stylesheet" href="admincss.css">
    <link rel="stylesheet" href="generaldesign.css">
    <link rel="stylesheet" href="admininput.css">
    <!-- <link rel="stylesheet" href="loginregister.css"> -->
    <link rel="icon" href="logo.png">
    <link href='https://cdn.boxicons.com/3.0.3/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <a href="index.php" class="logo">House of Verse</a>

        <nav class="navbar">
            <a href="admininput.php">Input</a>
            <a href="adminpage.php">Index</a>
            <a href="index.php">Logout</a>    
        </nav>
    </header>

    <h2 style="text-align:center; margin-top:100px"><b>Input New Artworks or Poems</b></h2>
    <form method="post" class="inputform" enctype="multipart/form-data">
            <input type="text" name="namaseni" placeholder="Title">          

            <input type="text" name="author" placeholder="Author">

            <input type="text" name="kategori" placeholder="Category">     

            <input type="text" name="deskripsi" placeholder="Description">               

            <input type="number" name="tahun_pembuatan" placeholder="Year made">             

            <input type="number" name="harga" placeholder="Price (in $)">             

            <p>Input your image here</p>

            <input type="file" name="gambar" required>               

            <input type="submit" name="input" value="INPUT">                
    </form>
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