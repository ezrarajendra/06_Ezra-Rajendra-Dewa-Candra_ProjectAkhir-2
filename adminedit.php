<?php
include 'connectdb.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM karyaseni WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    $d = mysqli_fetch_assoc($result);
}

if (isset($_POST['input'])) {
    $namaseni = mysqli_real_escape_string($koneksi, $_POST['namaseni']);
    $author = mysqli_real_escape_string($koneksi, $_POST['author']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $tahun_pembuatan = mysqli_real_escape_string($koneksi, $_POST['tahun_pembuatan']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);


    $file=$_FILES['gambar']['name'];
    $file_tmp=$_FILES['gambar']['tmp_name'];
    $folder='images/'.$file;

    if ($file != "") {
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $folder = 'images/'.$file;
        move_uploaded_file($file_tmp, $folder);
    } else {
        $file = $d['gambar'];
    }

    $query = "UPDATE karyaseni SET kategori='$kategori', namaseni='$namaseni', author='$author', deskripsi='$deskripsi', tahun_pembuatan='$tahun_pembuatan', harga='$harga', gambar='$file' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);


    if ($result) {
        echo '<script>alert("Input Success")</script>';
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
    <link rel="stylesheet" href="generaldesign.css">
    <link rel="stylesheet" href="admincss.css">
    <!-- <link rel="stylesheet" href="loginregister.css"> -->
    <link rel="stylesheet" href="admininput.css">
    <link rel="icon" href="logo.png">
    <link href='https://cdn.boxicons.com/3.0.3/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <a href="index.php" class="logo">House of Verse</a>

        <nav class="navbar">
            <a href="about.php">About</a>
            <a href="gallery.php">Gallery</a>
            <a href="login.php">Login</a>    
        </nav>
    </header>

    <form method="post" class="inputform" enctype="multipart/form-data">
            <input type="text" name="namaseni" value="<?php echo $d['namaseni'];?>">          

            <input type="text" name="author" value="<?php echo $d['author'];?>">

            <input type="text" name="kategori" value="<?php echo $d['kategori'];?>">     

            <input type="text" name="deskripsi" value="<?php echo $d['deskripsi'];?>">               

            <input type="number" name="tahun_pembuatan" value="<?php echo $d['tahun_pembuatan'];?>">             

            <input type="number" name="harga" value="<?php echo $d['harga'];?>">             

            <p>Previous Image : </p>

            <img src="images/<?php echo $d['gambar'];?>" width="100px">

            <p>Input your image here</p>

            <input type="file" name="gambar">               

            <input type="submit" name="input" value="INPUT">                
    </form>

    <footer>
        <div class="footercontent">
            <p>© 2024 House of Verse. All rights reserved.</p>
            <p>Designed by Ezra Rajendra Dewa Candra</p>
            <br>
        </div>
    </footer>
    
</body>
</html>