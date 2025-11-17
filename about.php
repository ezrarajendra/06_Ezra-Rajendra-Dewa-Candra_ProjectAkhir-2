<?php
    session_start();
    
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: index.php");
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
    <link rel="stylesheet" href="about.css">
    <link rel="icon" href="logo.png">
    <link href='https://cdn.boxicons.com/3.0.3/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <a href="home.php" class="logo">House of Verse</a>
        <nav class="navbar">
            <a href="about.php">About</a>
            <a href="gallery.php">Gallery</a>
            <?php
                if (isset($_SESSION['username'])) {
                    echo '<a href="home.php?logout=true">Logout</a>';
                } else {
                    echo '<a href="login.php">Login</a>';
                }
            ?>   
        </nav>
    </header>

    <div class="about">
        <br>
        <br>
        <h1>About House of Verse</h1>
        <p>House of Verse is a sanctuary where the noble arts find their voice, a dwelling wherein brush and quill alike conspire to conjure beauty from the breath of thought. Within these hallowed halls, every work is a testament to the enduring pursuit of human expression, where the whispers of centuries past meet the inspiration of the present. Here, the eye and the soul are invited to wander, to linger upon masterpieces that speak not only of skill, but of spirit and subtlety, and to behold the harmony of form and meaning intertwined.</p>
        <br>
        <p>In this haven, we champion the elegance of craft and the quiet power of reflection. Our mission is to preserve and celebrate works that stir wonder and awaken contemplation, offering every visitor a passage into realms where imagination dances with tradition. At House of Verse, every piece of art, every uttered phrase, is a beacon of timeless beauty, and every visitor is welcomed to partake in the eternal dialogue between human creativity and the heart that beholds it.</p>
        <br>
        <h1>Vision</h1>
        <p>Within these halls, we honor the harmony of form and spirit, the interplay of color and cadence. Our mission is to offer a haven where art and literature converse, where every visitor may feel the resonance of ages past and the inspiration of the present. We champion elegance, reflection, and the eternal pursuit of beauty.</p>
        <br>
        <h1>Mission</h1>
        <p>Our mission at House of Verse is to nurture the union of sight and word, to preserve and present works that awaken the imagination and stir the soul. We seek to offer a sanctuary where elegance, reflection, and timeless beauty reign, inviting every visitor to linger, to contemplate, and to discover the quiet majesty that dwells within art and literature alike.</p>
        <br>
        <br>
    </div>

    <br>
    <footer>
        <br>
        <br>
        <hr>
        <br>
        <div class="footercontent">
            <p>© 2024 House of Verse. All rights reserved.</p>
            <p>Designed by Ezra Rajendra Dewa Candra</p>
            <br>
        </div>
    </footer>
</body>
</html>